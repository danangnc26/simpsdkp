@section('content')
<!--========================================================
                              CONTENT
    =========================================================-->

    <main>

        <section class="well2 bg-alt">
            <div class="container">
                <div class="row">
                	<div class="col-md-8">
                	@if(empty($data_artikel))
		            @else
		            @foreach($data_artikel as $value_artikel)
                		<div class="row">
                			<div class="col-md-12">
                				<h2>{{$value_artikel->judul_post}}</h2>
                				<small>
                				<a href="#">Home</a>
                				 >> 
                				 <a href="#">Article</a>
                				  >> 
                				  Lorem Ipsum
                				 </small>
                			</div>
                		</div>


                		<!--  -->
                		{{$value_artikel->content_post}}
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