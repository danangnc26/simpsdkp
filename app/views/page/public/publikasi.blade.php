@section('content')
<!--========================================================
                              CONTENT
    =========================================================-->
    <style type="text/css">
    iframe{
    	width: 100%;
    	border:none;
    	height: 700px;
    }
    </style>
    <main>
        <section class="well2 bg-alt">
            <div class="container">
                <div class="row">
                	<div class="col-md-8">
                		<div class="row">
                			<div class="col-md-12">
                			<h2>Publikasi Pengawasan</h2>
	 		               	<small>
	 		                <a href="#">Home</a>
	 		               	>> 
	 		               	<a href="#">Publikasi Pengawasan</a>
	 		                </small>
                			</div>
                		</div>
                		<div class="row">
                			<div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" style="border:1px solid #000" data-wow-duration="2s">
		                        <div class="thumbnail">
		                            <a href="#"><img src="assets/pbl/images/page-1_img01.jpg" alt=""/></a>

		                            <div class="caption">
		                            	<a href="{{route('public.visitor.publikasipengawasan')}}">
		                              		  <h5>Jenis & Type Kapal Pengawas</h5>
		                                </a>

		                                <!-- <a href="" target="_blank" class="btn btn-primary btn-primary__mod">Learn more</a> -->
		                            </div>
		                        </div>
		                    </div>
                		</div>
                		<iframe src="{{route('public.visitor.plugin.pdfviewer', 'file='.route('public.visitor.buku.kapal_pengawas'))}}"></iframe>
                	</div>
                	<div class="col-md-4" >
                		@include('page.public.addon.sidebar')
                	</div>
                </div>
            </div>
        </section>

        

    </main>

@stop