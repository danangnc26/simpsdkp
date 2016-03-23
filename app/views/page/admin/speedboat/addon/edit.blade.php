<div class="ajax-text-and-image white-popup-block" style="width:50%;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Data Speedboat</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $value)
			{{Form::open(['route' => 'admin.upt.speedboat.updateSpeedboat', 'method' => 'post', 'id' => 'frm-update-speedboat', 'files' => true])}}
			{{Form::hidden('id_speedboat', Crypt::encrypt($value->id_speedboat), ['id' => 'id_speedboat'])}}
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Speedboat : </label>
						{{Form::text('nama_speedboat', $value->nama_speedboat, ['id' => 'nama_speedboat', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Speedboat', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Material Speedboat : </label>
						{{Form::select('id_material', Lib::getListMaterial(), $value->id_material, ['id' => 'id_material', 'class' => 'form-control', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Ukuran Speedboat : </label>
						{{Form::text('ukuran_speedboat', $value->ukuran_speedboat, ['id' => 'ukuran_speedboat', 'class' => 'form-control', 'placeholder' => 'Tulis Ukuran Speedboat', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Gambar Speedboat : </label>
						{{Form::file('gambar_speedboat', ['id' => 'gambar_speedboat', 'class' => 'form-control'])}}
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
				$('#frm-update-speedboat').submit(function(event){
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
								tbl_speedboat.fnReloadAjax();
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