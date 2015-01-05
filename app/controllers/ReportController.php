<?php

class ReportController extends BaseController
{
	public function form()
	{
		return View::make('report.form');
	}

	public function show()
	{
		$validation = Validator::make(Input::all(), TransactionReport::$rules);

		if ( $validation->fails() )
		{
			return Redirect::to('relatorio')->withErrors($validation)->withInput();
		}
		
		$data['media1'] = TransactionReport::getAvgOfICMSBetween( Input::get('date_begin_1'), Input::get('date_end_1') );
		
		$data['media2'] = '';
		if( Input::get('date_begin_2') != NULL )
			$data['media2'] = TransactionReport::getAvgOfICMSBetween( Input::get('date_begin_2'), Input::get('date_end_2') );

		return View::make('report.show', $data);
	}
}