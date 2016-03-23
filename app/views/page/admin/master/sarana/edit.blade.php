<div class="ajax-text-and-image white-popup-block" style="width:500px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Sarana</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $key => $value)
			{{Form::open(['route' => 'admin.master.sarana.update', 'method' => 'post', 'id' => 'frm-update-sarana'])}}
			<div class="form-group">
				{{Form::hidden('id', $value->id_sarana)}}
				<label>Nama sarana : </label>
				{{Form::text('nama_sarana', $value->nama_sarana, ['class' => 'form-control', 'id' => 'nama_sarana', 'required' => ''])}}
			</div>
			<div class="form-group">
				<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
			</div>
			{{Form::close()}}
			@endforeach
			@endif
			<script type="text/javascript">
				$('#frm-update-sarana').submit(function(event){
					event.preventDefault();

					$.post(
						$(this).prop('action'),
						{
							"id"			: $("input[name=id]").val(),
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