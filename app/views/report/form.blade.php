@extends('template.BlueTheme')

@section('content')

	@if( count($errors) > 0 )
		<center>
			<p>{{ $errors->first() }}</p>
		</center>
	@endif

	{{ Form::open()	 }}

		<div class="bloco">
			<div class="bloco">
				{{ Form::label('date1', 'Data Inicial 1:') }}<br>
				{{ Form::text('date_begin_1', Input::get('date_begin_1'), array('class' => 'date-input date')) }}
			</div>

			<div class="bloco">			
				{{ Form::label('date2','Data Final 1:') }}<br>
				{{ Form::text('date_end_1', Input::get('date_end_1'), array('class' => 'date-input date')) }}
			</div>
		</div>

		<div class="bloco">
			<div class="bloco">
				{{ Form::label('date2', 'Data Inicial 2:') }}<br>
				{{ Form::text('date_begin_2', Input::get('date_begin_2'), array('class' => 'date-input date')) }}
			</div>

			<div class="bloco">			
				{{ Form::label('date2','Data Final 2:') }}<br>
				{{ Form::text('date_end_2', Input::get('date_end_2'), array('class' => 'date-input date')) }}
			</div>
		</div>
		
		<div class="bloco">
			{{ Form::submit('Consultar', array('class' => 'report-submit')) }}
		</div>

	{{ Form::close() }}

@stop