<div class="ajax-text-and-image white-popup-block" style="width:30%;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Tambah Sarana</h3>
			<hr>
			{{Form::open(['route' => 'admin.upt.sarana.saveSarana', 'method' => 'post', 'id' => 'frm-input-sarana'])}}
			@if(Lib::uRole() == null)
				{{Form::hidden('id_upt', Request::get('id_upt'), ['id' => 'id_upt'])}}
			@else
			@endif
			<div class="form-group">
				<label>Nama Sarana : </label>
				{{Form::select('nama_sarana', Lib::getListSarana(), null, ['id' => 'nama_sarana', 'class' => 'form-control', 'required' => ''])}}
			</div>
			<div class="form-group">
				<label>Jumlah : </label>
				{{Form::number('jumlah_sarana', null, ['id' => 'jumlah_sarana', 'class' => 'form-control', 'required' => '', 'min' => '0'])}}
			</div>
			<div class="form-group">
				<label>Kondisi Sarana : </label>
				{{Form::text('kondisi_sarana', null, ['id' => 'kondisi_sarana', 'class' => 'form-control', 'required' => ''])}}
			</div>
			<div class="form-group">
				<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
			</div>
			{{Form::close()}}
			<script type="text/javascript">
				$('#frm-input-sarana').submit(function(event){
					event.preventDefault();

					$.post(
						$(this).prop('action'),
						{
							"id_upt"		: $("input[name=id_upt]").val(),
							"nama_sarana" 	: $("select[name=nama_sarana]").val(),
							"jumlah_sarana"	: $("input[name=jumlah_sarana]").val(),
							"kondisi_sarana": $("input[name=kondisi_sarana]").val()
						},
						function(e)
						{
							if(e.status == true){
								tbl_sarana.fnReloadAjax();
								alert(e.msg);
								c = confirm('Apakah anda ingin menginput data lagi?');
								if(c){
										$('#frm-input-sarana')[0].reset();
								}else{
										$.magnificPopup.close();		
								}
							}else{

							}
							
						},
						'json'
					);
				});
			</script>
		</div>
	</div>
</div>