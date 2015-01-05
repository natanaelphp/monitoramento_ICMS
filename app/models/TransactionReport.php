<?php

class TransactionReport
{
	public static $rules = array
	(
		'date_begin_1' => 'date_format:d/m/Y|required',
		'date_end_1'   => 'date_format:d/m/Y|required',
		'date_begin_2' => 'date_format:d/m/Y|required_with:date_end_2',
		'date_end_2'   => 'date_format:d/m/Y|required_with:date_begin_2'
	);

	public static function getAvgOfICMSBetween($date1, $date2)
	{
		$date1 = DateTime::createFromFormat( 'd/m/Y', $date1 )->format('Y-m-d');
		$date2 = DateTime::createFromFormat( 'd/m/Y', $date2 )->format('Y-m-d');

		$result = DB::select
		(
			"
				SELECT 
					AVG( (icms/value) * 100 ) AS media
				FROM 
					transactions
				WHERE 
					date BETWEEN ? AND ?
			",
			array($date1, $date2)
		);

		$media = $result[0]->media;

		if ( $media == FALSE ) $media = 'Não há transações neste periodo';

		return $media.'%';
	}

}