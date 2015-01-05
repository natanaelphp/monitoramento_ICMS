@extends('report.form')


@section('content')
	
	@parent

	<cesnter>

		<table class="table space">
			<tr>
				<th>Média de ICMS no Período 1</th>
				<th>Média de ICMS no Período 2</th>
			</tr>
			<tr>
				<td>{{ $media1 }}</td>
				<td>{{ $media2 }}</td>
			</tr>
		</table>

	</center>

@stop