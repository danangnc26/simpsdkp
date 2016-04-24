<div class="ajax-text-and-image white-popup-block" style="width:100%; min-width:1000px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Posisi Kapal Pengawas</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $value)
			<script type="text/javascript">
				function updateMarkerPosition(latLng) {
					document.getElementById('latitude').value = [latLng.lat()]
					document.getElementById('longitude').value = [latLng.lng()]
				}


				var map, geocoder, marker, infowindow;;

				
				var awal = new google.maps.LatLng({{($value->latlng == null) ? '-7.150975,110.14025939999999' : $value->latlng}}); 

				var petaoption = {zoom: 7,center: awal,mapTypeId: google.maps.MapTypeId.ROADMAP}; 

				map = new google.maps.Map(document.getElementById("map_canvas"),petaoption);

			      	// Mengambil referensi ke form HTML
			      	var form = document.getElementById('kota');

				      // Menangkap event submit form
				      form.onchange = function() {

				        // Mendapatkan alamat dari input teks
				        var address = $('select[name=kota] option:selected').text();

				        // Membuat panggilan Geocoder 
				        getCoordinates(address);

				        // Menghindari form dari page submit
				        return false;

				    }

				      // Membuat sebuah fungsi yang mengembalikan koordinat alamat
				      function getCoordinates(address) {
				      // Mengecek apakah terdapat 'geocoded object'. Jika tidak maka buat satu.
				      if(!geocoder) {
				      	geocoder = new google.maps.Geocoder();  
				      }

				      // Membuat objek GeocoderRequest
				      var geocoderRequest = {
				      	address: address
				      }

				      // Membuat rekues Geocode 
				      geocoder.geocode(geocoderRequest, function(results, status) {

				        // Mengecek apakah ststus OK sebelum proses
				        if (status == google.maps.GeocoderStatus.OK) {

				          // Menengahkan peta pada lokasi 
				          map.setCenter(results[0].geometry.location);

				          // Mengecek apakah terdapat objek marker
				          if (!marker) {
				            // Membuat objek marker dan menambahkan ke peta
				            marker = new google.maps.Marker({
				            	map: map
				            });
				        }

				          // Menentukan posisi marker ke lokasi returned location
				          marker.setPosition(results[0].geometry.location);

				          // Mengecek apakah terdapat InfoWindow object
				          if (!infowindow) {
				            // Membuat InfoWindow baru
				            infowindow = new google.maps.InfoWindow();
				        }

				          // membuat konten InfoWindow ke alamat
				          // dan posisi yang ditemukan
				          // var content = '<strong>' + results[0].formatted_address + '</strong><br />';
				          // content += 'Lat: ' + results[0].geometry.location.lat() + '<br />';
				          // content += 'Lng: ' + results[0].geometry.location.lng();

				          // // Menambahkan konten ke InfoWindow
				          // infowindow.setContent(content);

				          // // Membuka InfoWindow
				          // infowindow.open(map, marker);

				      } 

				  });

				}

				// OTHER MARKER
				@if(empty(Lib::getKapalMarker()))
				@else
				@foreach(Lib::getKapalMarker() as $key => $mark)
				@if($mark->latlng != null)
					var marker{{$key}} = new Marker({
						position : new google.maps.LatLng({{$mark->latlng}}),
						title : 'KP. {{$mark->nama_kapal_pengawas}}',
						map : map,
						icon: {
							path: MAP_PIN,
							fillColor: '#e12330',
							fillOpacity: 1,
							strokeColor: '#fff',
							strokeWeight: 2
						},
						map_icon_label: '<span class="map-icon map-icon-boating"></span>'
					});
				@endif
				@endforeach
				@endif

				var marker = new Marker({
					position : awal,
					title : 'KP. {{$value->nama_kapal_pengawas}}',
					map : map,
					draggable : true,
					icon: {
						path: MAP_PIN,
						fillColor: '#2499a3',
						fillOpacity: 1,
						strokeColor: '#fff',
						strokeWeight: 2
					},
					map_icon_label: '<span class="map-icon map-icon-boating"></span>'
				});
				
				updateMarkerPosition(awal);
				google.maps.event.addListener(marker, 'drag', function() {
					updateMarkerPosition(marker.getPosition());
				});		      
				</script>
			{{Form::open(['route' => 'admin.kapal_pengawas.save.posisi', 'method' => 'post', 'id' => 'save-posisi'])}}
			{{Form::hidden('id_kapal', Request::get('id_kapal'))}}
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Pangkalan Kapal: </label>
							</div>
							<div class="col-md-4">
								<label>
								<input type="radio" id="upt" class="form-control" name="opt_pangkalan" value="u"> UPT
								</label>		
							</div>
							<div class="col-md-4">
								<label>
								<input type="radio" id="satker" class="form-control" name="opt_pangkalan" value="s"> Satker
								</label>	
							</div>
							<div class="col-md-4">
								<label>
								<input type="radio" id="pos" class="form-control" name="opt_pangkalan" value="p"> Pos
								</label>	
							</div>
							
							<div class="col-md-12" id="upt_select" style="display:none; margin-top:10px;">
								{{Form::select('upt', Lib::getListUPT(), null, ['id' => 'upt', 'class' => 'form-control select2me'])}}
							</div>
							<div class="col-md-12" id="satker_select" style="display:none; margin-top:10px;">
								{{Form::select('satker', Lib::getListSatker(), null, ['id' => 'satker', 'class' => 'form-control select2me'])}}
							</div>
							<div class="col-md-12" id="pos_select" style="display:none; margin-top:10px;">
								{{Form::select('pos', Lib::getListPos(), null, ['id' => 'pos', 'class' => 'form-control select2me'])}}
							</div>
						</div>
						
					</div>
					<div class="form-group">
					<label><b>Posisi </b></label><br>
						<label>Provinsi : </label>
						{{Form::select('provinsi', Lib::getListProvinsi(), $value->kotaKapal->id_provinsi, ['id' => 'provinsi', 'class' => 'form-control select2me', 'data-placeholder' => '-- Pilih Provinsi --'])}}
					</div>
					<div class="form-group">
						<label>Kota : </label>
						@if($value->kotaKapal->id_kota != null)
						{{Form::select('kota', Lib::getListKota(), $value->kotaKapal->id_kota, ['id' => 'kota', 'class' => 'form-control select2me', 'data-placeholder' => '-- Pilih Kota --'])}}
						@else
						{{Form::select('kota', ['' => ''], null, ['id' => 'kota', 'class' => 'form-control select2me', 'data-placeholder' => '-- Pilih Kota --','disabled' => ''])}}
						@endif
					</div>
					<div class="form-group">
						<label>Nama Posisi : </label>
						{{Form::text('nama_posisi', $value->nama_posisi, ['id' => 'nama_posisi', 'class' => 'form-control', 'required' => '', 'placholder' => 'Tulis Nama Posisi'])}}
					</div>
					{{Form::hidden('latitude', null, ['id' => 'latitude'])}}
					{{Form::hidden('longitude', null, ['id' => 'longitude'])}}
				</div>
				<div class="col-md-8" >
					<small>* Geser marker berwarna hijau ke tempat yang diinginkan.</small><br>
					<div id="map_canvas" style="width:100%; height:300px" ></div>
				</div>
			</div>
			@endforeach
			@endif
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
			$('input[name=opt_pangkalan]').change(function(){
				if($(this).val() == 'u'){
					$('#upt_select').show();
					$('#satker_select').hide();
					$('#pos_select').hide();
				}
				if($(this).val() == 's'){
					$('#satker_select').show();
					$('#upt_select').hide();
					$('#pos_select').hide();
				}
				if($(this).val() == 'p'){
					$('#pos_select').show();
					$('#upt_select').hide();
					$('#satker_select').hide();
				}
			});

			$('select[name=kota]').change(function(){
				$('input[name=nama_posisi]').val($('select[name=kota] option:selected').text());
			});


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
						alert(d.msg);
						$.magnificPopup.close();
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