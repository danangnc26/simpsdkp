<div class="ajax-text-and-image white-popup-block" style="width:100%; min-width:900px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Data Satker</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $value)
			{{Form::open(['route' => 'admin.upt.satker.updateSatker', 'method' => 'post', 'id' => 'frm-edit-satker', 'files' => true])}}
			{{Form::hidden('id_satker', Crypt::encrypt($value->id_satker), ['id' => 'id_satker'])}}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama SATKER : </label>
						{{Form::text('nama_satker', $value->nama_satker, ['id' => 'nama_satker', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Satker', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Kepala SATKER : </label>
						{{Form::text('kepala_satker', $value->kepala_satker, ['id' => 'kepala_satker', 'class' => 'form-control', 'placeholder' => 'Tulis Kepala Satker', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>No. Telp : </label>
						{{Form::text('no_telp_satker', $value->no_telp_satker, ['id' => 'no_telp_satker', 'class' => 'form-control', 'placeholder' => 'Tulis No. Telp Satker'])}}
					</div>
					<div class="form-group">
						<label>Email : </label>
						{{Form::text('email_satker', $value->email_satker, ['id' => 'email_satker', 'class' => 'form-control', 'placeholder' => 'Tulis Email Satker'])}}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Alamat : </label>
						{{Form::text('alamat_satker', $value->alamat_satker, ['id' => 'alamat_satker', 'class' => 'form-control', 'placeholder' => 'Tulis Alamat Satker'])}}
					</div>
					<div class="form-group">
						<label>UPT : </label>
						{{Form::select('upt_satker', Lib::getListUPT(), $value->id_upt, ['id' => 'upt_satker', 'class' => 'form-control', 'required' => '', 'disabled' => ''])}}
						{{Form::hidden('id_upt', $value->id_upt)}}
					</div>
					<div class="form-group">
						<label>Gambar SATKER : </label>
						{{Form::file('gambar_satker', ['id' => 'gambar_satker', 'class' => 'form-control'])}}
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
			@endforeach
			@endif
			<script type="text/javascript">
				$('#frm-edit-satker').submit(function(event){
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
								@if(Lib::uRole() == null || Lib::uRole() == 'upt')	

								tbl_satker.fnReloadAjax();
								alert(d.msg);
								$.magnificPopup.close();	

								@else

								alert(d.msg);
								$.magnificPopup.close();	
								location.reload();

								@endif
							
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