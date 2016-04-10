
				@if(empty($data))
				@else
				@foreach($data as $value)
				{{Form::open(['route' => 'admin.cms.kategori.update', 'method' => 'post', 'id' => 'frm-update-kategori'])}}
				{{Form::hidden('id_kategori', Crypt::encrypt($value->id_kategori), ['id' => 'id_kategori'])}}
				<h4>Edit Kategori</h4>
				<hr>
				<div class="form-group">
					<label>Nama Kategori : *</label>
					{{Form::text('nama_kategori', $value->nama_kategori, ['id' => 'nama_kategori', 'class' => 'form-control', 'required' => ''])}}
				</div>
				<div class="form-group">
					<label>Deskripsi Kategori : </label>
					{{Form::textarea('deskripsi_kategori', $value->deskripsi_kategori, ['id' => 'deskripsi_kategori', 'class' => 'form-control', 'rows' => '4', 'style' => 'resize:none;'])}}
				</div>
				<div class="form-group">
					<label>UFL : </label>
					{{Form::text('ufl', $value->ufl, ['id' => 'ufl', 'class' => 'form-control'])}}
					<small><i>Nama kategori yang akan ditampilkan pada url.</i></small>
				</div>
				<div class="form-group">
					<label>Sub Kategori dari : </label>
					{{Form::select('sub_kategori', Lib::listCMSKategoriUtama(), $value->kategori_utama, ['id' => 'sub_kategori', 'class' => 'form-control'])}}
				</div>
				<div class="form-group">
					<button class="btn green">Simpan Kategori</button>
					<button onclick="kembali()" type="button" class="btn red">Batal</button>
				</div>
				{{Form::close()}}
				@endforeach
				@endif
				<script type="text/javascript">
				$('#frm-update-kategori').submit(function(event){
					event.preventDefault();

					$.post(
						$(this).prop('action'),
						{
							"id_kategori"			: $('input[name=id_kategori]').val(),	
							"nama_kategori"			: $('input[name=nama_kategori]').val(),	
							"deskripsi_kategori"	: $('textarea[name=deskripsi_kategori]').val(),
							"ufl"					: $('input[name=ufl]').val(),
							"sub_kategori"			: $('select[name=sub_kategori]').val()
						},
						function(data)
						{
							tbl_kategori.fnReloadAjax();
							kembali();
							alert(data.msg);
						},
						'json'
					);
				});
				function kembali()
				{
					if($('#form-kategori').empty()){
							$('#form-kategori').load("{{route('admin.cms.kategori.create')}}");
					}
				}
				</script>