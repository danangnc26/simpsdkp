<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Master Alat Tangkap
				</div>
				<div class="tools">
					<a  href="javascript:;" class="collapse" data-original-title="" title="">
					</a>
				</div>
				<div class="actions">
					<a id="create-alat-tangkap" href="{{route('admin.master.alat_tangkap.create')}}" class="btn btn-default btn-sm">
					<i class="fa fa-plus"></i> Tambah Alat Tangkap</a>
				</div>
			</div>
			<div class="portlet-body">

{{ Datatable::table()
	->setId('tbl_alat_tangkap')
    ->addColumn('Nama Alat Tangkap', 'Action')
    ->setOptions(
		array(
			'aoColumns' => 
				array(
					null, 
					array('bSortable' => false, 'width' => 130), 
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
			$(".edit-alat-tangkap").magnificPopup({
			  type: "ajax"
			});
		}'
	)
    ->setUrl(route('api.admin.master.alat_tangkap'))
    ->render() }}
    <script type="text/javascript">
    function hapus(a, b, c){
    	if(confirm(b)){
    		$.get(c + a, function(d){
    			tbl_alat_tangkap.fnReloadAjax();
    			alert(d.msg);
    		});
    	}
    }
    </script>
    </div>