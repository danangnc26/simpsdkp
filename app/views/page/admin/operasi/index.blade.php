@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-compass font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Data Operasi</span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-12">
				<a href="{{route('admin.operasi.create')}}">
					<button type="button" class="btn green">
						<i class="fa fa-plus"></i> Input Data Operasi
					</button>
				</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
			{{ Datatable::table()
			->setId('tbl_operasi')
		    ->addColumn('Tanggal', 'Kapal Pengawas', 'Status', 'Tindakan', 'Bendera Kapal')
		    ->setOptions(
				array(
					'aoColumns' => 
						array(
							null, 
							null, 
							null, 
							null, 
							null, 
						),
						'order' => 
							array(
								array(0, 'asc')
						    ),
						'lengthMenu' =>
							array(
								array(5, 10, 50, 100, -1),
								array(5, 10, 50, 100, 'All')
							)
				)
			)
			->setCallbacks(
				'fnDrawCallback', 'function ( oSettings ) {
					
				}'
			)
		    ->setUrl(route('admin.operasi.data.api'))
		    ->render() }}
		</div>
		</div>
	</div>
</div>
@stop