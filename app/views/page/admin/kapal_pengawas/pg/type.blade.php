<style type="text/css">
	th{
		text-align: center;
	}
</style>
<table class="table table-bordered table-striped table-condensed flip-content">
	<thead>
		<tr>
			<th>No.</th>
			<th>Type Kapal</th>
		</tr>
	</thead>
	<tbody>
	@if(empty($data))
	@else
	@foreach($data as $key => $value)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$value->nama_type_kapal}}</td>
		</tr>
	@endforeach
	@endif
	</tbody>
</table>