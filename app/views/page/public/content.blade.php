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
                				<h2 class="judul_artikel">{{$value_artikel->judul_post}}</h2>
                				<small>
                				<a href="#">Home</a>
                				 >> 
                				 <a href="#">Article</a>
                                 >>
                                 @if(empty($value_artikel->kategori) && count($value_artikel->kategori) == 0)
                                 @else
                                 @foreach($value_artikel->kategori as $kat)
                                 <a href="#">{{$kat->nama_kategori}}</a>
                                 >>
                                 @endforeach
                                 @endif
                				  >> 
                				  {{$value_artikel->judul_post}}
                				 </small><br>
                			</div>
                		</div>


                		<!--  -->
                        <div class="co-md-12">
                            <img src="{{asset('uploaded_images/gambar_utama').'/'.$value_artikel->gambar_utama}}" width="100%">
                            <hr>
                        </div>
                		{{$value_artikel->content_post}}
                         @if($value_artikel->label == null)
                                 @else
                                 <div class="pull-right">
                                 <i class="fa fa-tag"></i> : 
                                 @foreach($value_artikel->label as $lb)
                                  {{$lb->nama_label}}, 
                                 @endforeach
                                 </div>
                                 
                        @endif
                        <h5>Lampiran :</h5>
                        @if($value_artikel->lampiran == null)
                        @else
                        @foreach($value_artikel->lampiran as $lamp)
                        <i class="fa fa-file-pdf-o"></i> {{$lamp->nama_lampiran}}<br>
                        <!-- <i class="fa fa-file-excel-o"></i> Lampiran 2 <br>
                        <i class="fa fa-file-word-o"></i> Lampiran 3 <br>
                        <i class="fa fa-file"></i> Lampiran 4 -->
                        @endforeach
                        @endif
                        <hr>
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