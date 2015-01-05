@extends('template.BlueTheme')


@section('content')

	<a href="{{ URL::to('transacoes') }}">
		<img src="{{ asset('assets/img/back.png') }}" title='Voltar'>
	</a>

	<center>
		
		<p>Esta ação não poderá ser desfeita. Tem certeza que deseja excluir a seguinte transação? </p>
		</p><b>{{ $transaction->desc }}</b></p>

		{{ Form::open( array('url' => 'transacoes/excluir/'.$transaction->id, 'class' => 'form-transaction') ) }}
			{{ Form::hidden('id', $transaction->id	) }}
			Digite DELETAR no campo abaixo para exlcuir a transação.
			{{ Form::text('confirm') }}
			{{ Form::submit('Excluir') }}
		{{ Form::close() }}

	</center>
	
@stop