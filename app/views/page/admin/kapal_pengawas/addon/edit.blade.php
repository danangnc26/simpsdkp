<div class="ajax-text-and-image white-popup-block" style="width:50%;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Data Kapal Pengawas</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $value)
			{{Form::open(['route' => 'admin.upt.kapal_pengawas.updateKapalPengawas', 'method' => 'post', 'id' => 'frm-update-kapal-pengawas', 'files' => true])}}
			{{Form::hidden('id_kapal_pengawas', Crypt::encrypt($value->id_kapal_pengawas), ['id' => 'id_kapal_pengawas'])}}
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Kapal Pengawas : </label>
						{{Form::text('nama_kapal_pengawas', $value->nama_kapal_pengawas, ['id' => 'nama_kapal_pengawas', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Kapal Pengawas', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Material Kapal Pengawas : </label>
						{{Form::select('id_material', Lib::getListMaterial(), $value->id_material, ['id' => 'id_material', 'class' => 'form-control', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Spesifikasi Kapal Pengawas : </label>
						{{Form::text('spesifikasi', $value->spesifikasi, ['id' => 'spesifikasi', 'class' => 'form-control', 'placeholder' => 'Tulis Ukuran Kapal Pengawas', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Gambar Kapal Pengawas : </label>
						{{Form::file('gambar_kapal_pengawas', ['id' => 'gambar_kapal_pengawas', 'class' => 'form-control'])}}
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
			@endforeach
			@endif
			<script type="text/javascript">
				$('#frm-update-kapal-pengawas').submit(function(event){
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
								$.magnificPopup.close();		
							
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