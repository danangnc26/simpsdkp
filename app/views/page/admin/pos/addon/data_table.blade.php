			<button id="input-pos" href="{{route('admin.upt.pos.input', 'id_upt='.Request::get('id_upt'))}})}}" class="btn blue btn-sm"><i class="fa fa-plus"></i> Tambah Pos</button>
			<br>
			<br>

			{{ Datatable::table()
			->setId('tbl_pos')
		    ->addColumn('Nama Pos', 'Alamat', 'No. Telp', 'Action')
		    ->setOptions(
				array(
					'aoColumns' => 
						array(
							null, 
							null,
							null,
							array('bSortable' => false, 'width' => '8%'),
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
					$(".ubah-pos").magnificPopup({
					  type: "ajax"
					});
				}'
			)
		    ->setUrl(route('admin.upt.pos.api', 'id_upt='.Request::get('id_upt')))
		    ->render() }}

		     <script type="text/javascript">
				$('#input-pos, .ubah-pos').magnificPopup({
				  type: 'ajax'
				});
				function hapus(a, b, c){
			    	if(confirm(b)){
			    		$.get(c + a, function(d){
			    			tbl_pos.fnReloadAjax();
			    			alert(d.msg);
			    		});
			    	}
			    }
			</script>