			<button id="input-satker" href="{{route('admin.upt.satker.input', 'id_upt='.Request::get('id_upt'))}})}}" class="btn blue btn-sm"><i class="fa fa-plus"></i> Tambah Satker</button>
			<br>
			<br>

			{{ Datatable::table()
			->setId('tbl_satker')
		    ->addColumn('Nama Satker', 'Alamat', 'Kepala Satker', 'Action')
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
					$(".ubah-satker").magnificPopup({
					  type: "ajax"
					});
				}'
			)
		    ->setUrl(route('admin.upt.satker.api', 'id_upt='.Request::get('id_upt')))
		    ->render() }}

		    <script type="text/javascript">
				$('#input-satker, .ubah-satker').magnificPopup({
				  type: 'ajax'
				});
				function hapus(a, b, c){
			    	if(confirm(b)){
			    		$.get(c + a, function(d){
			    			tbl_satker.fnReloadAjax();
			    			alert(d.msg);
			    		});
			    	}
			    }
			</script>