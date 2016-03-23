<div class="ajax-text-and-image white-popup-block" style="width:100%; min-width:900px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Input Data Satker</h3>
			<hr>
			{{Form::open(['route' => 'admin.upt.satker.saveSatker', 'method' => 'post', 'id' => 'frm-input-satker', 'files' => true])}}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama SATKER : </label>
						{{Form::text('nama_satker', null, ['id' => 'nama_satker', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Satker', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Kepala SATKER : </label>
						{{Form::text('kepala_satker', null, ['id' => 'kepala_satker', 'class' => 'form-control', 'placeholder' => 'Tulis Kepala Satker', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>No. Telp : </label>
						{{Form::text('no_telp_satker', null, ['id' => 'no_telp_satker', 'class' => 'form-control', 'placeholder' => 'Tulis No. Telp Satker'])}}
					</div>
					<div class="form-group">
						<label>Email : </label>
						{{Form::text('email_satker', null, ['id' => 'email_satker', 'class' => 'form-control', 'placeholder' => 'Tulis Email Satker'])}}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Alamat : </label>
						{{Form::text('alamat_satker', null, ['id' => 'alamat_satker', 'class' => 'form-control', 'placeholder' => 'Tulis Alamat Satker'])}}
					</div>
					<div class="form-group">
						<label>UPT : </label>
						<?php
							if(Lib::uRole() == null){
								$id = Crypt::decrypt(Request::get('id_upt'));
							}else{
								$id =  Crypt::decrypt(Lib::getIdSatuan());
							}
						?>
						{{Form::select('upt_satker', Lib::getListUPT(), $id, ['id' => 'upt_satker', 'class' => 'form-control', 'required' => '', 'disabled' => ''])}}
						<input type="hidden" value="{{Request::get('id_upt')}}" id="id_upt" name="id_upt">
					</div>
					<div class="form-group">
						<label>Gambar SATKER : </label>
						{{Form::file('gambar_satker', ['id' => 'gambar_satker', 'class' => 'form-control', 'required' => ''])}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
						<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
					</div>
				</div>
			</div>
			{{Form::close()}}
			<script type="text/javascript">
				$('#frm-input-satker').submit(function(event){
					event.preventDefault();

					var formData = new FormData(this);

					$.ajax({
						type:'POST',
						url: $(this).attr('action'),
						data:formData,
						cache:false,
						contentType: false,
						processData: false,
						success:function(d){
								tbl_satker.fnReloadAjax();
								alert(d.msg);
								c = confirm('Apakah anda ingin menginput data lagi?');
								if(c){
										$('#frm-input-satker')[0].reset();
								}else{
										$.magnificPopup.close();		
								}
							
						},
						error: function(data){
							// console.log("error");
						                // console.log(data);
						}
					});
				// 	event.preventDefault();

				// 	$.post(
				// 		$(this).prop('action'),
				// 		{
				// 			"id_upt"		: $("input[name=id_upt]").val(),
				// 			"nama_sarana" 	: $("select[name=nama_sarana]").val(),
				// 			"jumlah_sarana"	: $("input[name=jumlah_sarana]").val(),
				// 			"kondisi_sarana": $("input[name=kondisi_sarana]").val()
				// 		},
				// 		function(e)
				// 		{
				// 			if(e.status == true){
				// 				tbl_sarana.fnReloadAjax();
				// 				alert(e.msg);
				// 				c = confirm('Apakah anda ingin menginput data lagi?');
				// 				if(c){
				// 						$('#frm-input-sarana')[0].reset();
				// 				}else{
				// 						$.magnificPopup.close();		
				// 				}
				// 			}else{

				// 			}
							
				// 		},
				// 		'json'
				// 	);
				});
			</script>
		</div>
	</div>
</div>