<div class="ajax-text-and-image white-popup-block" style="width:100%; min-width:1000px;">
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
				<div class="col-md-4">
					<h4><b>Nama & Gambar Kapal</b></h4>
					<div class="form-group">
						<label>Type Kapal : </label>
						{{Form::select('id_type_kapal', Lib::getListTypeKapal(), null, ['id' => 'id_type_kapal', 'class' => 'form-control', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Nama Kapal Pengawas : </label>
						{{Form::text('nama_kapal_pengawas', null, ['id' => 'nama_kapal_pengawas', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Kapal Pengawas', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Gambar Kapal Pengawas : </label>
						{{Form::file('gambar_kapal_pengawas', ['id' => 'gambar_kapal_pengawas', 'class' => 'form-control', 'required' => ''])}}
					</div>
				</div>
				<div class="col-md-4">
					<h4><b>Spesifikasi Kapal</b></h4>
					<div class="form-group">
						<label>Material Kapal Pengawas : </label>
						{{Form::select('id_material', Lib::getListMaterial(), null, ['id' => 'id_material', 'class' => 'form-control', 'required' => ''])}}
					</div>
					<div class="form-group">
						<label>Panjang ( LOA ) : </label>
						{{Form::text('panjang_loa', null, ['id' => 'panjang_loa', 'class' => 'form-control', 'placeholder' => 'Tulis Panjang ( LOA )'])}}
					</div>
					<div class="form-group">
						<label>Panjang antara ( LBP ) : </label>
						{{Form::text('panjang_lbp', null, ['id' => 'panjang_lbp', 'class' => 'form-control', 'placeholder' => 'Tulis Panjang antara ( LBP )'])}}
					</div>
					<div class="form-group">
						<label>Lebar : </label>
						{{Form::text('lebar', null, ['id' => 'lebar', 'class' => 'form-control', 'placeholder' => 'Tulis Lebar'])}}
					</div>
					<!-- <div class="form-group">
						<label>Spesifikasi Kapal Pengawas : </label>
						{{Form::text('spesifikasi', null, ['id' => 'spesifikasi', 'class' => 'form-control', 'placeholder' => 'Tulis Ukuran Kapal Pengawas'])}}
					</div> -->
				</div>
				<div class="col-md-4" style="margin-top:38px;">
					<div class="form-group">
						<label>Tinggi : </label>
						{{Form::text('tinggi', null, ['id' => 'tinggi', 'class' => 'form-control', 'placeholder' => 'Tulis Tinggi'])}}
					</div>
					<div class="form-group">
						<label>Kecepatan Maks : </label>
						{{Form::text('kecepatan_max', null, ['id' => 'kecepatan_max', 'class' => 'form-control', 'placeholder' => 'Tulis Kecepatan Maks'])}}
					</div>
					<div class="form-group">
						<label>Jumlah ABK : </label>
						{{Form::text('jml_abk', null, ['id' => 'jml_abk', 'class' => 'form-control', 'placeholder' => 'Tulis Jumlah ABK'])}}
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>Daya Mesin : </label>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{{Form::text('daya_mesin_1', null, ['id' => 'daya_mesin_1', 'class' => 'form-control', 'placeholder' => 'Main Engine'])}}
							</div>	
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{{Form::text('daya_mesin_2', null, ['id' => 'daya_mesin_2', 'class' => 'form-control', 'placeholder' => 'Auxelary Engine'])}}
							</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<hr>
					<div class="form-group">
						<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
						<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
					</div>
				</div>
			</div>
			{{Form::close()}}
			<script type="text/javascript">
				$('#id_type_kapal').change(function(){
					$.get("{{route('chk.type.kapal', 'id_type_kapal=')}}" + $(this).val(), function(data){
						$('#nama_kapal_pengawas').val($('#id_type_kapal option:selected').text()+' '+data.no_kapal)
					});
				});
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
								if($('#tbl_kapal_pengawas').length != 0){
								tbl_kapal_pengawas.fnReloadAjax();
								}
								
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