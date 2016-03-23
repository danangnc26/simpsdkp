<div class="ajax-text-and-image white-popup-block" style="width:500px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Material</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $key => $value)
			{{Form::open(['route' => 'admin.master.material.update', 'method' => 'post', 'id' => 'frm-update-material'])}}
			<div class="form-group">
				{{Form::hidden('id', $value->id_material)}}
				<label>Nama Material : </label>
				{{Form::text('nama_material', $value->nama_material, ['class' => 'form-control', 'id' => 'nama_material', 'required' => ''])}}
			</div>
			<div class="form-group">
				<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
			</div>
			{{Form::close()}}
			@endforeach
			@endif
			<script type="text/javascript">
				$('#frm-update-material').submit(function(event){
					event.preventDefault();

					$.post(
						$(this).prop('action'),
						{
							"id"			: $("input[name=id]").val(),
							"nama_material" : $("input[name=nama_material]").val()
						},
						function(e)
						{
							tbl_material.fnReloadAjax();
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