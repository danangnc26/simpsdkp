<div class="ajax-text-and-image white-popup-block" style="width:100%; min-width:1000px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Posisi Kapal Pengawas</h3>
			<hr>
			<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
			var peta;

				// // definisikan koordinat awal untuk peta
			 //        var awal = new google.maps.LatLng(-2.6570955,116.7134168); 
			 //       // peta option, berupa setting bagaimana peta itu akan muncul
			 //       var petaoption = {zoom: 14,center: awal,mapTypeId: google.maps.MapTypeId.ROADMAP}; 
			 //      // menuliskan koordinat peta dan memunculkannya ke halaman web
			 //      peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);
			 //      // marker 
			 //      tanda = new google.maps.Marker({position: awal, map: peta });
			</script>
			{{Form::open(['route' => 'admin.kapal_pengawas.save.posisi', 'method' => 'post', 'id' => 'save-posisi'])}}
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Pangkalan Kapal: </label>
						{{Form::select('upt', Lib::getListUPT(), null, ['id' => 'upt', 'class' => 'form-control select2me', 'data-placeholder' => '-- Pilih Provinsi --'])}}
					</div>
					<div class="form-group">
					<label><b>Posisi </b></label><br>
						<label>Provinsi : </label>
						{{Form::select('provinsi', Lib::getListProvinsi(), null, ['id' => 'provinsi', 'class' => 'form-control select2me', 'data-placeholder' => '-- Pilih Provinsi --'])}}
					</div>
					<div class="form-group">
						<label>Kota : </label>
						{{Form::select('kota', ['' => ''], null, ['id' => 'kota', 'class' => 'form-control select2me', 'data-placeholder' => '-- Pilih Kota --','disabled' => ''])}}
					</div>
					<div class="form-group">
						<label>Nama Posisi : </label>
						{{Form::text('nama_posisi', null, ['id' => 'nama_posisi', 'class' => 'form-control', 'required' => '', 'placholder' => 'Tulis Nama Posisi'])}}
					</div>
				</div>
				<div class="col-md-8" >
					<div id="map_canvas" style="width:100%; height:300px" ></div>
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
			Metronic.init(); // init metronic core componets
			$('.mfp-close, .mfp-wrap').click(function(){
				$('select#provinsi, select#upt').select2("close");
				$('.select2-drop').hide();
			});
			$('#provinsi').on('change', function(){
				$.post('{{ route('chain.kota') }}', {id_provinsi: $('#provinsi').val()}, function(e){
					$('#kota').removeAttr('disabled', false);
					$('#kota').select2('data', {id: null, text: '-- Pilih Kota --'});
		        	$('#kota').html(e);
			    });
			});
			$('#save-posisi').submit(function(event){
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
						// alert(d.msg);
						// location.replace(d.url);
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