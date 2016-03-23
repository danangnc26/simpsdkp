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
												<input checked type="radio" id="riksa" class="form-control" name="status" value="R"> Otomatis
												</label>
												<br	>
												<label>
												<input type="radio" id="tangkap" class="form-control" name="status" value="T"> Setel tanggal & waktu
												</label>	
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
				<button class="btn green">Simpan</button>
				<button class="btn green">Pratinjau</button>
				<button class="btn green">Tutup</button>
			</div>
		</div>
	</div>
</div>
{{HTML::script('assets/global/plugins/ckeditor/ckeditor.js')}}
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'editor_pos' , {
	extraPlugins: 'autogrow',
	autoGrow_maxHeight: 800,

	// Remove the Resize plugin as it does not make sense to use it in conjunction with the AutoGrow plugin.
	removePlugins: 'resize'
});
	// editor.resize( '100%', '350');
</script>
@stop