<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Master Material
				</div>
				<div class="tools">
					<a  href="javascript:;" class="collapse" data-original-title="" title="">
					</a>
				</div>
				<div class="actions">
					<a id="create-material" href="{{route('admin.master.material.create')}}" class="btn btn-default btn-sm">
					<i class="fa fa-plus"></i> Tambah Material</a>
				</div>
			</div>
			<div class="portlet-body">

{{ Datatable::table()
	->setId('tbl_material')
    ->addColumn('Nama Material', 'Action')
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
			$(".edit-material").magnificPopup({
			  type: "ajax"
			});
		}'
	)
    ->setUrl(route('api.admin.master.material'))
    ->render() }}
    <script type="text/javascript">
    function hapus(a, b, c){
    	if(confirm(b)){
    		$.get(c + a, function(d){
    			tbl_material.fnReloadAjax();
    			alert(d.msg);
    		});
    	}
    }
    </script>
    </div>