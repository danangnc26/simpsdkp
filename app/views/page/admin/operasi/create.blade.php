@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Input Data Operasi</span>
		</div>
	</div>
	<div class="portlet-body">
	<!--BEGIN TABS-->
	<div class="portlet-title tabbable-line">
		<div class="caption caption-md">
			<i class="icon-globe theme-font-color hide"></i>
				<!-- <span class="caption-subject theme-font-color bold uppercase">Feeds</span> -->
		</div>
		<ul class="nav nav-tabs">
			<li id="li_operasi" class="active">
				<a id="a_tb_operasi" href="#tb_operasi" data-toggle="tab">
					<i class="fa fa-home"></i>
					Operasi
				</a>
			</li>
			<li id="li_pelanggaran">
				<a id="a_tb_pelanggaran" href="#tb_pelanggaran" data-toggle="tab">
					<i class="fa fa-home"></i>
					Terindikasi Pelanggaran
				</a>
			</li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="tb_operasi">
			<div id="operasi">
				<br>
				{{Form::open(['route' => 'admin.operasi.save', 'id' => 'saveOperasi', 'files' => true, 'method' => 'post'])}}
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						<label>Tanggal : </label>
						<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
						{{Form::text('tanggal', null, ['id' => 'tanggal', 'class' => 'form-control', 'form-control', 'readonly' => '', 'required' => '', 'placeholder' => 'Tulis Tanggal Operasi'])}}
						<span class="input-group-btn">
						<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
						</span>
						</div>

						<!-- <input type="date" class="form-control"> -->
						</div>			
						<div class="form-group">
							<label>Pangkalan : </label>
							{{Form::text('no_telp_upt', Lib::getNamaPenempatanUser(), ['id' => 'no_telp_upt', 'class' => 'form-control', 'placeholder' => 'Tulis Nama UPT', 'disabled' => ''])}}
						</div>
						<div class="form-group">
							<label>Nama Kapal yang di operasi : </label>
							{{Form::text('nama_kapal_target', null, ['id' => 'nama_kapal_target', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Kapal Yang Dioperasi', 'required' => ''])}}
						</div>	
						<div class="form-group">
							<label>Kapal Pengawas melakukan operasi: </label>
							{{Form::select('kapal_pengawas', Lib::getListKapalPengawas(), null, ['id' => 'kapal_pengawas', 'class' => 'form-control select2me', 'required' => ''])}}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Bendera Negara : </label>
							{{Form::select('bendera_negara', Lib::getListNegara(), null, ['id' => 'bendera_negara', 'class' => 'form-control select2me bendera_kapal_z', 'required' => ''])}}
						</div>
						<div class="form-group">
							<label>Status : </label><br>
							<div class="row">
								<div class="col-md-3">
								<label>
								<input type="radio" id="riksa" name="status" value="R"> Riksa
								</label>
								</div>
								<div class="col-md-3">
									<label>
									<input type="radio" id="tangkap" name="status" value="T"> Tangkap
									</label>	
								</div>
							</div>
						</div>
						<div class="form-group" id="tindakan_dr" style="display:none">
							<label>Tindakan yang dilakukan : </label>
							{{Form::select('tindakan', ['' => '-- Pilih Tindakan --', 'AD' => 'Adhock / Kawal', 'TE' => 'Tenggelam', 'DI' => 'Dipulangkan'], null, ['id' => 'tindakan', 'class' => 'form-control select2me'])}}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					<hr>
							<button class="btn green">
								<i class="fa fa-save"></i> Simpan 
							</button> 
							<a href="#">
								<button type="button" class="btn red">
									<i class="fa fa-close"></i> Kembali 
								</button> 
							</a>
							<button type="button" class="btn yellow" id="resetForm">
								<i class="fa fa-refresh"></i> Reset Form 
							</button>
					</div>
				</div>
				{{Form::close()}}
			</div>
		</div>
		<div class="tab-pane" id="tb_pelanggaran">
			<div id="pelanggaran">
				<br>
				<div class="row">
					<div class="col-md-6">			
						<div class="form-group">
							<label>Foto Kapal : </label>
							{{Form::file('foto_kapal', ['id' => 'foto_kapal', 'class' => 'form-control', 'required' => ''])}}
						</div>			
						<div class="form-group">
							<label>Nama Tersangka : </label>
							{{Form::text('tersangka', null, ['id' => 'tersangka', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Tersangka', 'required' => ''])}}
						</div>	
						<div class="form-group">
							<label>Jumlah Awak Kapal : </label>
							{{Form::number('jumlah_awak', null, ['id' => 'jumlah_awak', 'class' => 'form-control', 'placeholder' => 'Tulis Jumlah Awak Kapal', 'required' => '', 'min' => '0'])}}
						</div>	
						<div class="form-group">
							<label>Proses Hukum : </label>
							{{Form::text('proses_hukum', null, ['id' => 'proses_hukum', 'class' => 'form-control', 'placeholder' => 'Tulis Proses Hukum', 'required' => ''])}}
						</div>
					</div>
					<div class="col-md-6">						
						<div class="form-group">
							<label>Keterangan Pelanggaran : </label>
							{{Form::textarea('keterangan_pelanggaran', null, ['id' => 'keterangan_pelanggaran', 'class' => 'form-control', 'placeholder' => 'Tulis Keterangan Pelanggaran', 'required' => '','rows' => 4])}}
						</div>	
						<div class="form-group">
							<label>Barang Bukti : </label>
							<div class="tes_bukti">
								<div class="row">
									<div class="col-md-6" style="padding-right:0px;">
										{{Form::select('barang_bukti', Lib::getListAlatTangkap(),null, ['class' => 'form-control', 'id' => 'barang_bukti'])}}
									</div>
									<div class="col-md-4" style="padding-right:0px;">
										{{Form::number('jumlah_barang_bukti', null, ['class' => 'form-control', 'id' => 'jumlah_barang_bukti', 'min' => '0', 'placeholder' => 'Jumlah'])}}
									</div>
									<div class="col-md-2" >
										<button class="btn btn-default">
										<i class="fa fa-remove"></i> 
										</button> 
									</div>
								</div>
							</div>
							<div class="tes"></div>
						</div>	
						<div class="form-group">
							<button id="tambah_bukti" class="btn blue">
									<i class="fa fa-plus"></i> Tambah Barang Bukti 
							</button> 
						</div>
						<script type="text/javascript">
							$('#tambah_bukti').click(function(){
								var a = '<div class="row" style="margin-top:5px;"><div class="col-md-6" style="padding-right:0px;">{{Form::select('barang_bukti', Lib::getListAlatTangkap(),null, ['class' => 'form-control', 'id' => 'barang_bukti'])}}</div><div class="col-md-4" style="padding-right:0px;"><input class="form-control" id="jumlah_barang_bukti" min="0" placeholder="Jumlah" name="jumlah_barang_bukti" type="number"></div><div class="col-md-2" ><button class="btn btn-default"><i class="fa fa-remove"></i> </button> </div></div>';
								$('.tes').append(a);
							});
						</script>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					<hr>
							<button class="btn green">
								<i class="fa fa-save"></i> Simpan 
							</button> 
							<a href="#">
								<button type="button" class="btn red">
									<i class="fa fa-close"></i> Kembali 
								</button> 
							</a>
							<button type="button" class="btn yellow" id="resetForm">
								<i class="fa fa-refresh"></i> Reset Form 
							</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--END TABS-->
	</div>
</div>
<script type="text/javascript">
	$('#resetForm').click(function(){
            $('#saveOperasi')[0].reset();
            $('#tindakan_dr').hide();
            // $('input').filter(':radio').prop('checked', false);
            $('div.radio span').attr('class', '');
	});
	$('input[name=status]').change(function(){
		// if()
		if($(this).val() == 'T'){
			$('#tindakan_dr').show();
			$('select#tindakan').attr('required', '');
		}else{
			$('#tindakan_dr').hide();
			$('select#tindakan').removeAttr('required');
		}
	});
	
	$('#saveOperasi').submit(function(event){
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
				if(d.next == false){
					alert(d.msg);
					location.replace(d.url);
				}else{
					if(confirm(d.msg+' , Apakah anda ingin melanjutkan ke input data pelanggaran?')){
						$('li#li_operasi').removeClass('active');
						$('li#li_pelanggaran').addClass('active');
						$('div#tb_pelanggaran').addClass('active');
						$('div#tb_operasi').removeClass('active');	
					}else{
						location.replace(d.url);
					}
					
				}
			},
			error: function(data){
				// console.log("error");
			                // console.log(data);
			}
		});
	});

	
</script>

@stop