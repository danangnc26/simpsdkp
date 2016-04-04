			<button id="input-speedboat" href="{{route('admin.upt.speedboat.input', 'id_upt='.Request::get('id_upt'))}})}}" class="btn blue btn-sm"><i class="fa fa-plus"></i> Tambah Speedboat</button>
			<br>
			<br>
			{{ Datatable::table()
			->setId('tbl_speedboat')
		    ->addColumn('Nama Speedboat', 'Ukuran ( Meter )', 'Material Speedboat', 'Action')
		    ->setOptions(
				array(
					'aoColumns' => 
						array(
							null, 
							null,
							null,
							array('bSortable' => false, 'width' => '8%')
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
					$(".ubah-speedboat").magnificPopup({
					  type: "ajax"
					});
				}'
			)
		    ->setUrl(route('admin.upt.speedboat.api', 'id_upt='.Request::get('id_upt')))
		    ->render() }}


		    <script type="text/javascript">
				$('#input-speedboat').magnificPopup({
				  type: 'ajax'
				});
				function hapus(a, b, c){
						    	if(confirm(b)){
						    		$.get(c + a, function(d){
						    			tbl_speedboat.fnReloadAjax();
						    			alert(d.msg);
						    		});
						    	}
						    }
			</script>
