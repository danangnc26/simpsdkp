<div class="ajax-text-and-image white-popup-block" style="width:500px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Alat Tangkap</h3>
			@if(empty($data))
			@else
			@foreach($data as $key => $value)
			<hr>
			{{Form::open(['route' => 'admin.master.alat_tangkap.update', 'method' => 'post', 'id' => 'frm-update-alat-tangkap'])}}
			<div class="form-group">
				{{Form::hidden('id', $value->id_alat_tangkap)}}
				<label>Nama Alat Tangkap : </label>
				{{Form::text('nama_alat_tangkap', $value->nama_alat_tangkap, ['class' => 'form-control', 'id' => 'nama_alat_tangkap', 'required' => ''])}}
			</div>
			<div class="form-group">
				<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
			</div>
			{{Form::close()}}
			@endforeach
			@endif
			<script type="text/javascript">
				$('#frm-update-alat-tangkap').submit(function(event){
					event.preventDefault();

					$.post(
						$(this).prop('action'),
						{
							"id"				: $("input[name=id]").val(),
							"nama_alat_tangkap" : $("input[name=nama_alat_tangkap]").val()
						},
						function(e)
						{
							tbl_alat_tangkap.fnReloadAjax();
							alert(e.msg);
							$.magnificPopup.close();
						},
						'json'
					);
				});
			</script>
		</div>
	</div>
</div>