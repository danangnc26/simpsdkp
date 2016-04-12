

@if($data == null || count($data) == 0)
<center><h4>Data Tidak Ditemukan.</h4></center>
@else
@foreach($data as $value)

<div class="col-md-4" style="margin-bottom:20px;">
	<div class="col-md-12">
		<div class="row">
			<img src="{{asset('uploaded_images/slider/'.$value->gambar_slider)}}" width="100%" style="border:1px solid #dfdfdf; border-bottom:0px;">
		</div>
	</div>
	<div class="col-md-12" style="border:1px solid #dfdfdf; border-bottom:0px;">
		<p>
			<label>Caption : </label><br>
			{{$value->keterangan}}
		</p>
	</div>
	<div class="col-md-12" style="border:1px solid #dfdfdf; ">
		<div class="row">
			<div class="pull-right" >
				<div class="btn-group">
					@if($value->is_used == 1)
					<button onclick="updStat('{{Crypt::encrypt($value->id_slider)}}', 'Nonaktifkan?', 0)" style="border-top:0px; border-bottom:0px;" type="button" class="btn btn-default tt-nonaktif"><i style="color:#e12330;" class="fa fa-close"></i></button>
					@else
					<button onclick="updStat('{{Crypt::encrypt($value->id_slider)}}', 'Aktifkan?', 1)" style="border-top:0px; border-bottom:0px;" type="button" class="btn btn-default tt-aktif"><i style="color:#32c5d2" class="fa fa-check"></i></button>
					@endif
					<button style="border-top:0px; border-right:0px; border-bottom:0px;" type="button" class="btn btn-default tt-edit"><i class="fa fa-edit"></i></button>
					<button onclick="hapus('{{Crypt::encrypt($value->id_slider)}}')" style="border-top:0px; border-bottom:0px; border-right:0px;" type="button" class="btn btn-default tt-hapus"><i class="fa fa-trash"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>

@endforeach
@endif
<script type="text/javascript">
	cst_tooltip();
	function hapus(id){
		if(confirm("Hapus data ini?")){
			$.get("{{route('admin.cms.slider.delete', 'id_slider=')}}" + id, function(d){
				loadContent();
				alert(d.msg);
			});
		}
	}
	function updStat(id, c, v){
		if(confirm(c)){
			$.get("{{route('admin.cms.slider.updstat', 'id_slider=')}}" + id + '&vl=' + v, function(d){
				loadContent();
				alert(d.msg);
			});
		}
	}
</script>