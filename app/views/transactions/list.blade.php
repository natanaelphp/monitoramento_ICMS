@extends('template.BlueTheme')


@section('content')

	<div id='content'>

		<a href="{{ URL::to('transacoes/nova') }}" class='new'>
			<img src='{{ asset('assets/img/new.png') }}' class='img middle'> 
			Nova Transação
		</a>


		@if( $transactions->count() == 0 )

			<p>Nenhuma transação cadastrada.</p>

		@else

			<table class='table' width='100%'>

				<th>Descrição</th>
				<th>Data</th>
				<th width='110'>Valor Pago</th>
				<th>ICMS</th>
				<th>Porcentagem</th>
				<th>Alterar</th>
				<th>Excluir</th>

				@foreach( $transactions as $transaction)
				
					<tr>
						<td>{{ $transaction->desc  }}</td>
						<td>{{ DateTime::createFromFormat('Y-m-d', $transaction->date)->format('d/m/Y') }}</td>
						<td>{{ $transaction->value }}</td>
						<td>{{ $transaction->icms  }}</td>
						<td>{{ $transaction->icms/$transaction->value * 100 }} %</td>
						<td class='center-text'>
							<a href="transacoes/alterar/{{ $transaction->id}}">
								<img src='assets/img/edit.png' title='Alterar'>
							</a> 
						</td>
						<td class='center-text'>
							<a href="transacoes/excluir/{{ $transaction->id}}"> 
								<img src='assets/img/delete.png' title='Excluir'>
							</a> 
						</td>
					</tr>

				@endforeach

			</table>

			{{ $transactions->links() }}

			<p></p>

		@endif

	</div>



@stop