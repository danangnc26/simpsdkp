<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Master Negara
				</div>
				<div class="tools">
					<a  href="javascript:;" class="collapse" data-original-title="" title="">
					</a>
				</div>
				<div class="actions">
					<a id="create-negara" href="{{route('admin.master.negara.create')}}" class="btn btn-default btn-sm">
					<i class="fa fa-plus"></i> Tambah Negara</a>
				</div>
			</div>
			<div class="portlet-body">

			{{ Datatable::table()
			->setId('tbl_negara')
		    ->addColumn('Nama Negara', 'Action')
		    ->setOptions(
				array(
					'aoColumns' => 
						array(
							null, 
							array('bSortable' => false, 'width' => 130), 
						),
						'order' => 
							array(
								array(1, 'asc')
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
					$(".edit-negara").magnificPopup({
					  type: "ajax"
					});
				}'
			)
		    ->setUrl(route('api.admin.master.negara'))
		    ->render() }}


    <script type="text/javascript">
    function hapus(a, b, c){
    	if(confirm(b)){
    		$.get(c + a, function(d){
    			tbl_negara.fnReloadAjax();
    			alert(d.msg);
    		});
    	}
    }
    </script>
    </div>