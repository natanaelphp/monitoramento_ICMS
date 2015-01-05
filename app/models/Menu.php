<?php

class Menu
{
	private static function config()
	{
		$config = array(
			'home' 			  => 'Home',
			'transacoes' 	  => 'Transações',
			'relatorio' 	  => 'Relatório'
		);
		
		return $config;
	}

	public static function show()
	{
		$output = ''; $selected ='';

		foreach (self::config() as $url => $label)
		{
			//if ( $url == Request::path() ) $selected = 'class="selected"';
			if ( strstr( Request::path(), $url ) ) $selected = 'class="selected"';
			$output .= '<li><a href="'.URL::to($url).'" '.$selected.'>'.$label.'</a></li>';
			$selected = '';
		}
		
		return $output;
	}

}