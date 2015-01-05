<?php

class Transaction extends Eloquent
{
	public static $rules = array
	(
		'desc' 	=> 'required|min:3',
		'date'	=> 'required|date_format:d/m/Y',
		'value' => 'required|numeric|not_in:0',
		'icms' 	=> 'required|numeric',
	);


	
}