@section('content')
<!--========================================================
                              CONTENT
    =========================================================-->

    <main>
        <section class="well2 bg-alt">
            <div class="container">
                <div class="row">
                	<div class="col-md-8">

                		<h2 class="text-center">Featured Books</h2>
                    	<div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="2s">
	                        <div class="thumbnail">
	                            <a href="#"><img src="assets/pbl/images/page-1_img01.jpg" alt=""/></a>

	                            <div class="caption">
	                                <h5>Jenis & Type Kapal Pengawas</h5>

	                                <a href="{{route('public.visitor.buku.kapal_pengawas')}}" target="_blank" class="btn btn-primary btn-primary__mod">Learn more</a>
	                            </div>
	                        </div>
	                    </div>

	                   
                	</div>
                	<div class="col-md-4" >
                		@include('page.public.addon.sidebar')
                	</div>
                </div>
            </div>
        </section>

        

    </main>

@stop