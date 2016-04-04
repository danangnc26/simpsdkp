			
			<button id="input-sarana" href="{{route('admin.upt.sarana.input', 'id_upt='.Request::get('id_upt'))}})}}" class="btn blue btn-sm"><i class="fa fa-plus"></i> Tambah Sarana</button>
			<br>
			<br>

			{{ Datatable::table()
			->setId('tbl_sarana')
		    ->addColumn('Nama Sarana', 'Jumlah ( Unit )', 'Kondisi', 'Action')
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
					$(".ubah-sarana").magnificPopup({
					  type: "ajax"
					});
				}'
			)
		    ->setUrl(route('admin.upt.sarana.api', 'id_upt='.Request::get('id_upt')))
		    ->render() }}
<script type="text/javascript">
	$('#input-sarana').magnificPopup({
	  type: 'ajax'
	});
	function hapus(a, b, c){
			    	if(confirm(b)){
			    		$.get(c + a, function(d){
			    			tbl_sarana.fnReloadAjax();
			    			alert(d.msg);
			    		});
			    	}
			    }
</script>