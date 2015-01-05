@extends('template.BlueTheme')


@section('content')
	
	<center>
	
		<a href="{{ URL::to('transacoes/nova') }}">
			<div class='box'>
				<img src='assets/img/write.png' class='box-img'><br>
				Nova Transação
			</div>
		</a>

		<a href="{{ URL::to('transacoes') }}">
			<div class='box'>
				<img src='assets/img/list.png' class='box-img'><br>
				Listar Transações
			</div>
		</a>

		<a href="{{ URL::to('relatorio') }}">
			<div class='box'>
				<img src='assets/img/report.png' class='box-img'><br>
				Relatório
			</div>
		</a>
		
	</center>


@stop