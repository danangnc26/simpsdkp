<div class="ajax-text-and-image white-popup-block" style="width:30%;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Edit Slider</h3>
			<hr>
			@if(empty($data))
			@else
			@foreach($data as $value)
			{{Form::open(['route' => 'admin.cms.slider.update', 'method' => 'post', 'id' => 'frm-update-slider', 'files' => true])}}
			{{Form::hidden('id_slider', Crypt::encrypt($value->id_slider))}}
			<div class="form-group">
				<label>File Gambar : </label>
				{{Form::file('gambar_slider', ['class' => 'form-control', 'id' => 'gambar_slider'])}}	
			</div>
			<div class="form-group">
				<label>Keterangan : </label>
				{{Form::textarea('keterangan_slider', $value->keterangan, ['class' => 'form-control', 'id' => 'keterangan_slider', 'rows' => 5])}}
			</div>
			<div class="form-group">
				<label>Aktifkan Gambar ? </label><br>
				<div class="row">
					<div class="col-md-4">
					<label>
						<input {{($value->is_used == 1) ? 'checked' : ''}} type="radio" id="publikasi" name="is_active" value="1"> Ya
					</label>		
				</div>
				<div class="col-md-5">
					<label>
						<input {{($value->is_used == 0) ? 'checked' : ''}} type="radio" id="draft" name="is_active" value="0"> Tidak
					</label>	
				</div>
				</div>
			</div>
			<div class="form-group">
				<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
			</div>
			{{Form::close()}}
			@endforeach
			@endif
			<script type="text/javascript">
				$('#frm-update-slider').submit(function(event){
					event.preventDefault();				

					var formData = new FormData();
					
					formData.append('id_slider', $('input[name=id_slider]').val());
					$.each($('input[name=gambar_slider]')[0].files, function(i, file) {
					     formData.append('gambar_slider', file);
					 });
					formData.append('keterangan', $('textarea[name=keterangan_slider]').val());
					formData.append('status', $("input[name=is_active]:checked").val());
									
					$.ajax({
						type:'POST',
						url: $(this).attr('action'),
						data:formData,
						cache:false,
						contentType: false,
						processData: false,
						success:function(d){
							loadContent();
							alert(d.msg);
							$.magnificPopup.close();		
						},
						error: function(err){
										// console.log("error");
									                // console.log(data);
						}
					 });
					
				});
			</script>
		</div>
	</div>
</div>