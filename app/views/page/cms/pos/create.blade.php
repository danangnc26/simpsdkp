@section('content')
<style type="text/css">
	.note-editable{
		min-height: 300px;
	}
</style>
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Pos</span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
		{{Form::open(['route' => 'admin.cms.post.save', 'method' => 'post', 'id' => 'frm-save-pos', 'files' => true])}}
			<div class="col-md-9">
				{{Form::text('judul_pos', null, ['id' => 'judul_pos', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Judul Pos'])}}
				<br	/>
				<label>Gambar Utama : </label>
				{{Form::file('gambar_utama', ['class' => 'form-control', 'id' => 'gambar_utama'])}}
				<br	/>
				{{--Form::textarea('editor_pos', null, ['id' => 'editor_pos', 'class' => '', 'style' => 'width:100%', 'rows' => '0', 'cols' => '0'])--}}
				<textarea style="display:none;" name="editor_pos" id="summernote_1"></textarea>
			</div>
		
			<div class="col-md-3">
			<h4><i class="fa fa-cogs"></i> Setelan</h4>
			<hr>
				<div class="panel-group accordion" id="accordion1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
										Waktu Publikasi </a>
										</h4>
									</div>
									<div id="collapse_1" class="panel-collapse collapse">
										<div class="panel-body">
												<label>
												<input checked type="radio" id="otomatis" class="form-control" name="waktu_publikasi" value="O"> Otomatis
												</label>
												<br	>
												<label>
												<input type="radio" id="manual" class="form-control" name="waktu_publikasi" value="M"> Setel tanggal & waktu
												</label>
												<div id="waktu_manual" style="display:none;"> 
													{{Form::text('tanggal', null, ['id' => 'tanggal', 'class' => 'form-control date-picker', 'style' => 'width: 49%; float:left; font-size: 0.9em;', 'data-date-format' => 'dd-mm-yyyy', 'placeholder' => 'Tanggal', 'readonly' => ''])}}
													{{Form::text('jam', null, ['id' => 'jam', 'class' => 'form-control timepicker timepicker-24', 'style' => 'width: 49%; float:right', 'placeholder' => 'Jam', 'readonly' => ''])}}
													<!-- <input id="jam" class="form-control timepicker timepicker-24" style="width: 49%; float:right" name="jam" type="text"> -->
												</div>	
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
										Label </a>
										</h4>
									</div>
									<div id="collapse_2" class="panel-collapse collapse">
										<div class="panel-body">
										<input type="hidden" id="select2_sample5" class="form-control select2" value="red, blue">

											{{Form::text('tags', null, ['id' => 'tags', 'class' => 'form-control'])}}
											<small><i>Pisahkan kata dengan tanda koma.</i></small>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
										Kategori </a>
										</h4>
									</div>
									<div id="collapse_3" class="panel-collapse collapse" aria-expanded="true">
										<div class="panel-body">
										
											@if(empty($kategori) || count($kategori) == 0)
											@else
											<?php
											foreach ($kategori as $key => $value) {
												if($value->kategori_utama == null){
													$k[] = ['id_kategori' => $value->id_kategori, 'nama_kategori' => $value->nama_kategori];
												}
											}

											foreach ($kategori as $key2 => $value2) {
												if($value2->kategori_utama != null){
													$k2[] = ['id_kategori' => $value2->id_kategori, 'kategori_utama' => $value2->kategori_utama, 'nama_kategori' => $value2->nama_kategori];
												}
											}
											?>
											@foreach($k as $v1)
												<li style="list-style-type:none;">
													<input type="checkbox" class="form-control" name="kategori_pos[]" value="{{$v1['id_kategori']}}"> {{$v1['nama_kategori']}}
												</li>
												@foreach($k2 as $v2)
													@if($v2['kategori_utama'] == $v1['id_kategori'])
													<li style="list-style-type:none; margin-left:20px;">
														<input type="checkbox" class="form-control" name="kategori_pos[]" value="{{$v2['id_kategori']}}"> {{$v2['nama_kategori']}}
													</li>
													@endif
												@endforeach									
											@endforeach
											@endif
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">
										Lampiran Tambahan </a>
										</h4>
									</div>
									<div id="collapse_4" class="panel-collapse collapse" aria-expanded="true">
										<div class="panel-body">
											{{Form::file('lampiran', ['class' => 'form-control'])}}
										</div>
									</div>
								</div>
								<div class="row" style="margin-top:20px;">
									<div class="col-md-7">
									<label>
									<input checked type="radio" id="publikasi" class="form-control" name="opt_publikasi" value="1"> Publikasikan
									</label>		
									</div>
									<div class="col-md-5">
									<label>
									<input type="radio" id="draft" class="form-control" name="opt_publikasi" value="0"> Draft
									</label>	
									</div>
								</div>
				</div>				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<button class="btn green"><i class="fa fa-send"></i> Publikasikan</button>
				<!-- <button type="button" class="btn blue"><i class="fa fa-save"></i> Simpan</button> -->
				<button type="button" class="btn yellow"><i class="fa fa-eye"></i> Pratinjau</button>
				<button onclick="location.replace('{{route('admin.cms.post.index.all')}}')" type="button" class="btn red"><i class="fa fa-close"></i> Tutup</button>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
{{--HTML::script('assets/global/plugins/ckeditor/ckeditor.js')--}}
<script type="text/javascript">
// SUMMERNOTE
	function sendFile(file,editor,welEditable) {

      data = new FormData();
      data.append("gambar", file);
       $.ajax({
       url: "{{route('admin.cms.post.editor.upload')}}",
       data: data,
       cache: false,
       contentType: false,
       processData: false,
       type: 'POST',
       success: function(data){
       // alert(data.msg);
        editor.insertImage(welEditable, data.img_dir);
    },
       error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus+" "+errorThrown);
      }
    });
   }

	// var editor = CKEDITOR.replace( 'editor_pos' , {
	// 	extraPlugins: 'autogrow',
	// 	autoGrow_maxHeight: 800,
	// 	removePlugins: 'resize'
	// });

	$('input[name=waktu_publikasi]').change(function(){
		if($(this).val() == 'M'){
			$('#waktu_manual').show();
		}else{
			$('#waktu_manual').hide();
		}
	});


	

	$('#frm-save-pos').submit(function(event){
		event.preventDefault();

		if($('input[name=waktu_publikasi]:checked').val() == 'O'){
			var wkt = moment().format('YYYY-MM-DD hh:mm:ss');
		}else{
			var wkt = moment($('input[name=tanggal]').val()).format('YYYY-MM-DD') + ' ' + $('input[name=jam]').val();
		}
		var checked_kat = []
		$("input[name='kategori_pos[]']:checked").each(function ()
		{
		    checked_kat.push(parseInt($(this).val()));
		});

		 

		var formData = new FormData();
		$.each($('input[name=gambar_utama]')[0].files, function(i, file) {
		     formData.append('gambar_utama', file);
		 });
		formData.append('judul_pos', $('input[name=judul_pos]').val());
		// formData.append('gambar_utama', file_gambar_utama);
		formData.append('content', $('#summernote_1').code()/*.replace(/<\/?[^>]+(>|$)/g, "")*/);
		formData.append('tanggal', wkt);
		formData.append('status', $("input[name=opt_publikasi]:checked").val());
		if(checked_kat.length > 0){
			formData.append('kategori_pos', JSON.stringify(checked_kat));
		}

		$.ajax({
			type:'POST',
			url: $(this).attr('action'),
			data:formData,
			cache:false,
			contentType: false,
			processData: false,
			success:function(d){
				alert(d.msg);
			},
			error: function(err){
							// console.log("error");
						                // console.log(data);
			}
		 });
	});
	
</script>
@stop