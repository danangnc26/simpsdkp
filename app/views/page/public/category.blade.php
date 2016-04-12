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
                	
                		<div class="row">
                			<div class="col-md-12">
                			<?php $s = ($sub == null) ? $main : $sub; ?>
                			<h2>{{Lib::replaceString($s, true)}}</h2>
	 		               	<small>
	 		                <a href="{{route('public.visitor.home')}}">Home</a>
	 		               	>> 
	 		               	<a href="#">Kategori</a>
	 		               	>> 
	 		                <a href="{{route('public.visitor.showCategory', ['category' => $main])}}">
	 		                	{{Lib::replaceString($main, true)}}
	 		                </a>
	 		                @if($sub != null)
	 		               	 >> 
	 		                <a href="{{route('public.visitor.showCategory', ['category' => $main, 'sub_category' => $sub])}}">
	 		                	{{Lib::replaceString($sub, true)}}
	 		                </a>
	 		                @endif
	 		                </small>
                			</div>
                		</div>
                		<!--  -->
                	@foreach($content as $val_con)	
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
		                					{{Lib::limitString($val_con->content_post, 500)}}
		                				</p>
		                				<a href="{{route('public.visitor.showContent', Lib::replaceString($val_con->judul_post))}}" class="cst pull-right">
		                					Selengkapnya &#187;
		                				</a>
		                			</div>
		               			</div>
	                		</div>
                		</div>
                		<hr class="cst-line"></hr>
                		
                		<!-- PAGINATION -->
                		<!-- <a href="#" class="btn btn-primary">1</a>
                		<a href="#" class="btn btn-primary">2</a>
                		<a href="#" class="btn btn-primary">3</a>
                		<a href="#" class="btn btn-primary">4</a>
                		<a href="#" class="btn btn-primary">5</a> -->
                		<!-- PAGINATION -->
                		<!--  -->
                	@endforeach
                	@endif
                	{{$content->links()}}
                	</div>
                	<div class="col-md-4" >
                		@include('page.public.addon.sidebar')
                	</div>
                </div>
            </div>
        </section>

        

    </main>

@stop