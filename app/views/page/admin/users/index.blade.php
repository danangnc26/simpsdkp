@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Kelola User</span>
		</div>
	</div>
	<div class="portlet-body">
			{{ Datatable::table()
			->setId('tbl_users')
		    ->addColumn('Nama', 'Username', 'Email', 'Status')
		    ->setOptions(
				array(
					'aoColumns' => 
						array(
							null, 
							null,
							null,
							array('bSortable' => false, 'width' => '9%')
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
		    ->setUrl(route('admin.users.api'))
		    ->render() }}
	</div>
</div>
@stop