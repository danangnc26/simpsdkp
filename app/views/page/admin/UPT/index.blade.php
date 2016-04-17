@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-anchor font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Daftar UPT</span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-12">
				<a href="{{route('admin.upt.create')}}">
					<button type="button" class="btn green">
						<i class="fa fa-plus"></i> Tambah UPT Baru 
					</button>
				</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
		{{ Datatable::table()
			->setId('tbl_upt')
		    ->addColumn('Nama UPT', 'Alamat', 'Kepala Pangkalan', 'Kota / Kabupaten', 'Provinsi', 'Action')
		    ->setOptions(
				array(
					'aoColumns' => 
						array(
							null, 
							null,
							null,
							null,
							null,
							array('bSortable' => false, 'width' => '15%')
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
					//$(".tes").tooltip({title: "asdf"});
					$(document).ready(function() {    
					   Metronic.init(); // init metronic core componets
					  

					});
				}'
			)
		    ->setUrl(route('admin.upt.api'))
		    ->render() }}
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function edit(a, b){
		location.replace(b + a);
	}

    function hapus(a, b, c){
    	if(confirm(b)){
    		$.get(c + a, function(d){
    			tbl_upt.fnReloadAjax();
    			alert(d.msg);
    		});
    	}
    }
</script>
@stop