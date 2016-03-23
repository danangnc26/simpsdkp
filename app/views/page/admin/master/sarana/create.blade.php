<div class="ajax-text-and-image white-popup-block" style="width:500px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Tambah Sarana</h3>
			<hr>
			{{Form::open(['route' => 'admin.master.sarana.save', 'method' => 'post', 'id' => 'frm-create-sarana'])}}
			<div class="form-group">
				<label>Nama Sarana : </label>
				{{Form::text('nama_sarana', null, ['class' => 'form-control', 'id' => 'nama_sarana', 'required' => ''])}}
			</div>
			<div class="form-group">
				<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
			</div>
			{{Form::close()}}
			<script type="text/javascript">
				$('#frm-create-sarana').submit(function(event){
					event.preventDefault();

					$.post(
						$(this).prop('action'),
						{
							"nama_sarana" : $("input[name=nama_sarana]").val()
						},
						function(e)
						{
							tbl_sarana.fnReloadAjax();
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