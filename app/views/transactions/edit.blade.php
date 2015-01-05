@extends('template.BlueTheme')


@section('content')

	<a href="{{ URL::to('transacoes') }}">
		<img src="{{ asset('assets/img/back.png') }}" title='Voltar'>
	</a>

	@if( count($errors) > 0 )
		<center>
			<p>{{ $errors->first() }}</p>
		</center>
	@endif
	
	<form action="" method="post" class="form-transaction">

		{{ Form::label('desc', 'Descrição:') }}
		{{ Form::text('desc', $transaction->desc) }}

		{{ Form::label('date', 'Data:') }}
		{{ 
			Form::text(
				'date', 
				DateTime::createFromFormat('Y-m-d', $transaction->date)->format('d/m/Y'), 
				array( 'class' => 'date')
			) 
		}}

		{{ Form::label('value', 'Valor pago:') }}
		{{ Form::text('value', $transaction->value) }}

		{{ Form::label('icms', 'ICMS:') }}
		{{ Form::text('icms', $transaction->icms) }}

		{{ Form::submit('Alterar') }}

	</form>

@stop