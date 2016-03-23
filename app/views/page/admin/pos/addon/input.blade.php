<div class="ajax-text-and-image white-popup-block" style="width:100%; min-width:900px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Input Data Pos</h3>
			<hr>
			{{Form::open(['route' => 'admin.upt.pos.savePos', 'method' => 'post', 'id' => 'frm-input-pos', 'files' => true])}}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Pos : </label>
						{{Form::text('nama_pos', null, ['id' => 'nama_pos', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Pos', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>No. Telp : </label>
						{{Form::text('no_telp_pos', null, ['id' => 'no_telp_pos', 'class' => 'form-control', 'placeholder' => 'Tulis No. Telp Pos'])}}
					</div>
					<div class="form-group">
						<label>Email : </label>
						{{Form::text('email_pos', null, ['id' => 'email_pos', 'class' => 'form-control', 'placeholder' => 'Tulis Email Pos'])}}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Alamat : </label>
						{{Form::text('alamat_pos', null, ['id' => 'alamat_pos', 'class' => 'form-control', 'placeholder' => 'Tulis Alamat Pos'])}}
					</div>
					<div class="form-group">
						<label>UPT : </label>
						{{Form::select('upt_pos', Lib::getListUPT(), Crypt::decrypt(Request::get('id_upt')), ['id' => 'upt_pos', 'class' => 'form-control', 'required' => '', 'disabled' => ''])}}
						<input type="hidden" value="{{Request::get('id_upt')}}" id="id_upt" name="id_upt">
					</div>
					<div class="form-group">
						<label>Gambar Pos : </label>
						{{Form::file('gambar_pos', ['id' => 'gambar_pos', 'class' => 'form-control', 'required' => ''])}}
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
				$('#frm-input-pos').submit(function(event){
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
								tbl_pos.fnReloadAjax();
								alert(d.msg);
								c = confirm('Apakah anda ingin menginput data lagi?');
								if(c){
										$('#frm-input-pos')[0].reset();
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