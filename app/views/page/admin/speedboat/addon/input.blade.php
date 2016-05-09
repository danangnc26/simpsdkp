<div class="ajax-text-and-image white-popup-block" style="width:50%;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Input Data Speedboat</h3>
			<hr>
			{{Form::open(['route' => 'admin.upt.speedboat.saveSpeedboat', 'method' => 'post', 'id' => 'frm-input-speedboat', 'files' => true])}}
			@if(Lib::uRole() == null)
			{{Form::hidden('id_upt', Request::get('id_upt'), ['id' => 'id_upt'])}}
			@else
			@endif
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Type Speedboat : </label>
						{{Form::select('id_type_speedboat', Lib::getListTypeSpeedboat(), null, ['id' => 'id_type_speedboat', 'class' => 'form-control', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Nama Speedboat : </label>
						{{Form::text('nama_speedboat', null, ['id' => 'nama_speedboat', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Speedboat', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Material Speedboat : </label>
						{{Form::select('id_material', Lib::getListMaterial(), null, ['id' => 'id_material', 'class' => 'form-control', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Ukuran Speedboat : </label>
						{{Form::text('ukuran_speedboat', null, ['id' => 'ukuran_speedboat', 'class' => 'form-control', 'placeholder' => 'Tulis Ukuran Speedboat', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Gambar Speedboat : </label>
						{{Form::file('gambar_speedboat', ['id' => 'gambar_speedboat', 'class' => 'form-control', 'required' => ''])}}
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
				$('#id_type_speedboat').change(function(){
					$.get("{{route('chk.type.speedboat', 'id_type_speedboat=')}}" + $(this).val(), function(data){
						$('#nama_speedboat').val($('#id_type_speedboat option:selected').text()+' '+data.no_speedboat)
					});
				});
				$('#frm-input-speedboat').submit(function(event){
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
								c = confirm('Apakah anda ingin menginput data lagi?');
								if(c){
										$('#frm-input-speedboat')[0].reset();
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