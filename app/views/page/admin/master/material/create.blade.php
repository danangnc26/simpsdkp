<div class="ajax-text-and-image white-popup-block" style="width:500px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Tambah Material</h3>
			<hr>
			{{Form::open(['route' => 'admin.master.material.save', 'method' => 'post', 'id' => 'frm-create-material'])}}
			<div class="form-group">
				<label>Nama Material : </label>
				{{Form::text('nama_material', null, ['class' => 'form-control', 'id' => 'nama_material', 'required' => ''])}}
			</div>
			<div class="form-group">
				<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
			</div>
			{{Form::close()}}
			<script type="text/javascript">
				$('#frm-create-material').submit(function(event){
					event.preventDefault();

					$.post(
						$(this).prop('action'),
						{
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