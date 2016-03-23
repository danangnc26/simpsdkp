<div class="ajax-text-and-image white-popup-block" style="width:100%; min-width:900px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Data Pos</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $value)
			{{Form::open(['route' => 'admin.upt.pos.updatePos', 'method' => 'post', 'id' => 'frm-update-pos', 'files' => true])}}
			{{Form::hidden('id_pos', Crypt::encrypt($value->id_pos), ['id' => 'id_pos'])}}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Pos : </label>
						{{Form::text('nama_pos', $value->nama_pos, ['id' => 'nama_pos', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Pos', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>No. Telp : </label>
						{{Form::text('no_telp_pos', $value->no_telp_pos, ['id' => 'no_telp_pos', 'class' => 'form-control', 'placeholder' => 'Tulis No. Telp Pos'])}}
					</div>
					<div class="form-group">
						<label>Email : </label>
						{{Form::text('email_pos', $value->email_pos, ['id' => 'email_pos', 'class' => 'form-control', 'placeholder' => 'Tulis Email Pos'])}}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Alamat : </label>
						{{Form::text('alamat_pos', $value->alamat_pos, ['id' => 'alamat_pos', 'class' => 'form-control', 'placeholder' => 'Tulis Alamat Pos'])}}
					</div>
					<div class="form-group">
						<label>UPT : </label>
						{{Form::select('upt_pos', Lib::getListUPT(), $value->id_upt, ['id' => 'upt_pos', 'class' => 'form-control', 'required' => '', 'disabled' => ''])}}
					</div>
					<div class="form-group">
						<label>Gambar Pos : </label>
						{{Form::file('gambar_pos', ['id' => 'gambar_pos', 'class' => 'form-control'])}}
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
				$('#frm-update-pos').submit(function(event){
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

								tbl_pos.fnReloadAjax();
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