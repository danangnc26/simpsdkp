@section('content')
<!--========================================================
                              CONTENT
    =========================================================-->

    <main>
        <section class="well2 bg-alt">
            <div class="container">
                <div class="row">
                	<div class="col-md-8">
                	@if(empty($content) && count($content) == 0)
                	@else
                	@foreach($content as $val_kat)
                		<div class="row">
                			<div class="col-md-12">
                				<h2>{{$val_kat->nama_kategori}}</h2>
                				<small>
                				<a href="#">Home</a>
                				 >> 
                				 <a href="{{route('public.visitor.showCategory', Lib::replaceString($val_kat->nama_kategori))}}">{{$val_kat->nama_kategori}}</a>
                				 </small>
                			</div>
                		</div>
                		<!--  -->
                		<!-- PAGINATION -->
                		<a href="#" class="btn btn-primary">1</a>
                		<a href="#" class="btn btn-primary">2</a>
                		<a href="#" class="btn btn-primary">3</a>
                		<a href="#" class="btn btn-primary">4</a>
                		<a href="#" class="btn btn-primary">5</a>
                		<!-- PAGINATION -->
                		@foreach($val_kat->post as $val_con)
                		<div class="row">
                			<div class="col-md-12">
	                			<div class="row">
	                				@if($val_con->gambar_utama == null)
	                				@else
	                				<div class="col-md-4">
		                				<img src="{{asset('uploaded_images/gambar_utama/'.$val_con->gambar_utama)}}" width="100%" style="height:180px;">
		                			</div>
		                			@endif
		                			@if($val_con->gambar_utama == null)
		                			<div class="col-md-12">
	                				@else
	                				<div class="col-md-8">
	                				@endif
		                				<a href="{{route('public.visitor.showContent', Lib::replaceString($val_con->judul_post))}}">
		                					<h4>{{$val_con->judul_post}}</h4>
		                				</a>
		                				<p style="margin-top:10px;">
		                					{{Lib::limitString($val_con->content_post)}}
		                				</p>
		                				<a href="{{route('public.visitor.showContent', Lib::replaceString($val_con->judul_post))}}" class="cst pull-right">
		                					Selengkapnya &#187;
		                				</a>
		                			</div>

		               			</div>
	                		</div>
                		</div>
                		<hr class="cst-line"></hr>
                		@endforeach
                		
                		<!-- PAGINATION -->
                		<a href="#" class="btn btn-primary">1</a>
                		<a href="#" class="btn btn-primary">2</a>
                		<a href="#" class="btn btn-primary">3</a>
                		<a href="#" class="btn btn-primary">4</a>
                		<a href="#" class="btn btn-primary">5</a>
                		<!-- PAGINATION -->
                		<!--  -->
                	@endforeach
                	@endif
                	</div>
                	<div class="col-md-4" >
                		@include('page.public.addon.sidebar')
                	</div>
                </div>
            </div>
        </section>

        

    </main>

@stop