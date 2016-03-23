@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Tambah Data UPT</span>
		</div>
	</div>
	<div class="portlet-body">
		{{Form::open(['route' => 'admin.upt.save', 'id' => 'saveUPT', 'files' => true, 'method' => 'post'])}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<label>Nama UPT : </label>
				{{Form::text('nama_upt', null, ['id' => 'nama_upt', 'class' => 'form-control', 'placeholder' => 'Tulis Nama UPT'])}}
				</div>			
				<div class="form-group">
					<label>Kepala UPT : </label>
					{{Form::text('kepala_upt', null, ['id' => 'kepala_upt', 'class' => 'form-control', 'placeholder' => 'Tulis Kepala UPT'])}}
				</div>
				<div class="form-group">
					<label>No. Telepon : </label>
					{{Form::text('no_telp_upt', null, ['id' => 'no_telp_upt', 'class' => 'form-control', 'placeholder' => 'Tulis No. Telp UPT'])}}
				</div>
				<div class="form-group">
					<label>Email UPT : </label>
					{{Form::text('email_upt', null, ['id' => 'email_upt', 'class' => 'form-control', 'placeholder' => 'Tulis Email UPT'])}}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Alamat UPT : </label>
					{{Form::text('alamat_upt', null, ['id' => 'alamat_upt', 'class' => 'form-control', 'placeholder' => 'Tulis Alamat UPT'])}}
				</div>
				<div class="form-group">
					<label>Provinsi : </label>
					{{Form::select('provinsi_upt', Lib::getListProvinsi(), null, ['id' => 'provinsi_upt', 'class' => 'form-control select2me', 'data-placeholder' => '-- Pilih Provinsi --'])}}
				</div>
				<div class="form-group">
					<label>Kota : </label>
					{{Form::select('kota_upt', ['' => ''], null, ['id' => 'kota_upt', 'class' => 'form-control select2me', 'data-placeholder' => '-- Pilih Kota --','disabled' => ''])}}
				</div>
				<div class="form-group">
					<label>Gambar UPT: </label>
					{{Form::file('gambar_upt', ['id' => 'gambar_upt', 'class' => 'form-control', 'required' => ''])}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<hr>
					<button class="btn green">
						<i class="fa fa-save"></i> Simpan 
					</button> 
					<a href="{{route('admin.upt.index')}}">
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

<script type="text/javascript">
	 $('#resetForm').click(function(){
            $('#saveUPT')[0].reset();
            $('#provinsi_upt').select2('data', {id: null, text: ''});
	 });
	$('#provinsi_upt').on('change', function(){
		$.post('{{ route('chain.kota') }}', {id_provinsi: $('#provinsi_upt').val()}, function(e){
			$('#kota_upt').removeAttr('disabled', false);
			$('#kota_upt').select2('data', {id: null, text: '-- Pilih Kota --'});
        	$('#kota_upt').html(e);
	    });
	});
	
	$('#saveUPT').submit(function(event){
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
				location.replace(d.url);
			},
			error: function(data){
				// console.log("error");
			                // console.log(data);
			}
		});
	});

</script>

@stop