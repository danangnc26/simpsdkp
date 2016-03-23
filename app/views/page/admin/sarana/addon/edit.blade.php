<div class="ajax-text-and-image white-popup-block" style="width:30%;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Sarana</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $value)
			{{Form::open(['route' => 'admin.upt.sarana.updateSarana', 'method' => 'post', 'id' => 'frm-update-sarana'])}}
			{{Form::hidden('id_pv_sarana', Crypt::encrypt($value->id_pv_sarana), ['id' => 'id_pv_sarana'])}}
			{{--Form::hidden('id_upt', Crypt::encrypt($value->id_upt), ['id' => 'id_upt'])--}}
			<div class="form-group">
				<label>Nama Sarana : </label>
				{{Form::select('nama_sarana', Lib::getListSarana(), $value->id_sarana, ['id' => 'nama_sarana', 'class' => 'form-control', 'required' => ''])}}
			</div>
			<div class="form-group">
				<label>Jumlah : </label>
				{{Form::number('jumlah_sarana', $value->jumlah_sarana, ['id' => 'jumlah_sarana', 'class' => 'form-control', 'required' => '', 'min' => '0'])}}
			</div>
			<div class="form-group">
				<label>Kondisi Sarana : </label>
				{{Form::text('kondisi_sarana', $value->kondisi, ['id' => 'kondisi_sarana', 'class' => 'form-control', 'required' => ''])}}
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
							"id_pv_sarana"	: $("input[name=id_pv_sarana]").val(),
							"id_upt"		: $("input[name=id_upt]").val(),
							"nama_sarana" 	: $("select[name=nama_sarana]").val(),
							"jumlah_sarana"	: $("input[name=jumlah_sarana]").val(),
							"kondisi_sarana": $("input[name=kondisi_sarana]").val()
						},
						function(e)
						{
							if(e.status == true){
								tbl_sarana.fnReloadAjax();
								alert(e.msg);
								$.magnificPopup.close();		
							}else{

							}
							
						},
						'json'
					);
				});
			</script>
		</div>
	</div>
</div>