@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Pos</span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-9">
				{{Form::text('judul_pos', null, ['id' => 'judul_pos', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Judul Pos'])}}
				<br	/>
				{{Form::textarea('editor_pos', null, ['id' => 'editor_pos', 'class' => '', 'style' => 'width:100%', 'rows' => '0', 'cols' => '0'])}}
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
													{{Form::text('tanggal', null, ['id' => 'tanggal', 'class' => 'form-control date-picker', 'style' => 'width: 49%; float:left; font-size: 0.9em;', 'data-date-format' => 'dd-mm-yyyy', 'placeholder' => 'Tanggal'])}}
													<input id="jam" class="form-control" style="width: 49%; float:right" name="jam" type="time">
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
											@if(empty($kategori))
											@else
											@foreach($kategori as $ka)
											<li style="list-style-type:none;">
												<input type="checkbox" class="form-control" name="kategori_pos[]" value="{{Crypt::encrypt($ka->id_kategori)}}"> {{$ka->nama_kategori}}
											</li>
											@endforeach
											@endif
										</div>
									</div>
								</div>
				</div>				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<button class="btn green">Publikasikan</button>
				<button class="btn blue">Simpan</button>
				<button class="btn yellow">Pratinjau</button>
				<button class="btn red">Tutup</button>
			</div>
		</div>
	</div>
</div>
{{HTML::script('assets/global/plugins/ckeditor/ckeditor.js')}}
<script type="text/javascript">

	var editor = CKEDITOR.replace( 'editor_pos' , {
		extraPlugins: 'autogrow',
		autoGrow_maxHeight: 800,
		removePlugins: 'resize'
	});

	$('input[name=waktu_publikasi]').change(function(){
		if($(this).val() == 'M'){
			$('#waktu_manual').show();
		}else{
			$('#waktu_manual').hide();
		}
	});
	
</script>
@stop