			<button id="input-kapal-pengawas" href="{{route('admin.upt.kapal_pengawas.input', 'id_upt='.Request::get('id_upt'))}})}}" class="btn blue btn-sm"><i class="fa fa-plus"></i> Tambah Kapal Pengawas</button>
			<br>
			<br>


			{{ Datatable::table()
			->setId('tbl_kapal_pengawas')
		    ->addColumn('Nama Kapal Pengawas', 'Ukuran ( Meter )', 'Material Kapal Pengawas', 'Personil', 'Action')
		    ->setOptions(
				array(
					'aoColumns' => 
						array(
							null, 
							null,
							null,
							null,
							array('bSortable' => false, 'width' => '14%')
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
					$(".ubah-kapal-pengawas").magnificPopup({
					  type: "ajax"
					});
				}'
			)
		    ->setUrl(route('admin.upt.kapal_pengawas.api', 'id_upt='.Request::get('id_upt')))
		    ->render() }}

		    <script type="text/javascript">
				$('#input-kapal-pengawas').magnificPopup({
				  type: 'ajax'
				});
				function hapus(a, b, c){
			    	if(confirm(b)){
			    		$.get(c + a, function(d){
			    			tbl_kapal_pengawas.fnReloadAjax();
			    			alert(d.msg);
			    		});
			    	}
			    }
			</script>