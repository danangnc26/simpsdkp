@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Kategori</span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-4">
				<div id="form-kategori"></div>
			</div>
			<div class="col-md-8">
				{{ Datatable::table()
				->setId('tbl_kategori')
			    ->addColumn('Nama Kategori', 'Deskripsi', 'UFL', 'Action')
			    ->setOptions(
					array(
						'aoColumns' => 
							array(
								null, 
								array('bSortable' => false), 
								array('bSortable' => false), 
								array('bSortable' => false, 'width' => 70), 
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
						cst_tooltip();
					}'
				)
			    ->setUrl(route('admin.cms.kategori.api'))
			    ->render() }}
			</div>
		</div>		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#form-kategori').load("{{route('admin.cms.kategori.create')}}");
	});

	
	function hapus(a, b, c){
		if(confirm(b)){
			$.get(c + a, function(d){
				tbl_kategori.fnReloadAjax();
				alert(d.msg);
			});
		}
	}

	function ubah(a){
		if($('#form-kategori').empty()){
			$('#form-kategori').load("{{route('admin.cms.kategori.edit', 'id=')}}" + a);	
		}
	}
</script>

@stop