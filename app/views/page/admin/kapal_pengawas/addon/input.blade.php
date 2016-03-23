<div class="ajax-text-and-image white-popup-block" style="width:50%;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Input Data Kapal Pengawas</h3>
			<hr>
			{{Form::open(['route' => 'admin.upt.kapal_pengawas.saveKapalPengawas', 'method' => 'post', 'id' => 'frm-input-kapal-pengawas', 'files' => true])}}
			@if(Lib::uRole() == null)
				{{Form::hidden('id_upt', Request::get('id_upt'), ['id' => 'id_upt'])}}
			@else
			@endif
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Kapal Pengawas : </label>
						{{Form::text('nama_kapal_pengawas', null, ['id' => 'nama_kapal_pengawas', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Kapal Pengawas', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Material Kapal Pengawas : </label>
						{{Form::select('id_material', Lib::getListMaterial(), null, ['id' => 'id_material', 'class' => 'form-control', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Spesifikasi Kapal Pengawas : </label>
						{{Form::text('spesifikasi', null, ['id' => 'spesifikasi', 'class' => 'form-control', 'placeholder' => 'Tulis Ukuran Kapal Pengawas', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Gambar Kapal Pengawas : </label>
						{{Form::file('gambar_kapal_pengawas', ['id' => 'gambar_kapal_pengawas', 'class' => 'form-control', 'required' => ''])}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
						<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
					</div>
				</div>
			</div>
			{{Form::close()}}
			<script type="text/javascript">
				$('#frm-input-kapal-pengawas').submit(function(event){
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
								tbl_kapal_pengawas.fnReloadAjax();
								alert(d.msg);
								c = confirm('Apakah anda ingin menginput data lagi?');
								if(c){
										$('#frm-input-kapal-pengawas')[0].reset();
								}else{
										$.magnificPopup.close();		
								}
							
						},
						error: function(data){
							// console.log("error");
						                // console.log(data);
						}
					});
				});
			</script>
		</div>
	</div>
</div>