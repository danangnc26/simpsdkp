					@if(Route::currentRouteName() != 'public.visitor.home')
                    <div class="col-md-12 col-sm-6 col-xs-6 text-left wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div style="background:transparent;" class="block-icon">
                            <div class="icon">
                                <i class="fa fa-ship"></i>
                            </div>
                            <div class="block_caption">
                            <a href="{{route('public.visitor.data.kapal_pengawas')}}">
                                <h3 class="fw-b txt-clr1" style="color:#333333">Kapal Pengawas <br/> <span class="fw-n">
                                   <small>Speedboat</small> </span></h3>
                                <!-- <a href="#" class="btn-link">Learn more</a> -->
                            </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-6 text-left wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div style="background:transparent;" class="block-icon">
                            <div class="icon">
                                <i class="fa fa-balance-scale"></i>
                            </div>
                            <div class="block_caption">
                                <h3 class="fw-b txt-clr1" style="color:#333333">Tindak Pidana <br/> <span class="fw-n">
                                    <small>Data Pelanggaran</small> </span></h3>
                                <!-- <a href="#" class="btn-link">Learn more</a> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-6 clearboth text-left wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div style="background:transparent;" class="block-icon">
                            <div class="icon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <div class="block_caption">
                                <h3 class="fw-b txt-clr1" style="color:#333333">Laporan Kegiatan <br/> <span class="fw-n">
                                   <small>Bulanan, Tahunan</small> </span></h3>
                                <!-- <a href="#" class="btn-link">Learn more</a> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-6 text-left wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
                        <div style="background:transparent;" class="block-icon">
                            <div class="icon">
                                <i class="fa  fa-line-chart "></i>
                            </div>
                            <div class="block_caption">
                                <h3 class="fw-b txt-clr1" style="color:#333333">Capaian IKU <br/> <span class="fw-n">
                                    <small>Capaian Harian</small> </span></h3>
                                <!-- <a href="#" class="btn-link">Learn more</a> -->
                            </div>
                        </div>
                    </div>
                    @endif
                


				<!-- <h2 class="text-center">Categories</h2> -->
				<?php
				$kategori = CMSKategoriModel::all();
				?>
				@if(empty($kategori) || count($kategori) == 0)
				@else
				<?php
				$k = [];
				$k2 = [];
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
				<ul class="content-list row">
						@foreach($k as $v1)
						<li class="col-md-12 col-sm-3 col-xs-6 wow fadeInRight" data-wow-duration="2s">
						<a href="{{route('public.visitor.showCategory', Lib::replaceString($v1['nama_kategori']))}}">
						<h5>{{$v1['nama_kategori']}}</h5>
						</a>
						<ul>
							@foreach($k2 as $v2)
								@if($v2['kategori_utama'] == $v1['id_kategori'])
										<li><a href="{{route('public.visitor.showCategory', ['category' => Lib::replaceString($v1['nama_kategori']), 'sub_category' => Lib::replaceString($v2['nama_kategori'])])}}">{{$v2['nama_kategori']}}</a></li>
								@endif
							@endforeach	
						</ul>								
						<!-- <a href="#" class="btn-link btn-link__mod">+ More</a> -->
						</li>
						@endforeach
						@endif
					<!-- <li class="col-md-12 col-sm-3 col-xs-6 wow fadeInRight" data-wow-duration="2s">
						<h5>Biographies & Memoirs</h5>
						<ul>
							<li><a href="#">Historical</a></li>
							<li><a href="#">Leaders & Notable People</a></li>
							<li><a href="#">Memoirs</a></li>
						</ul>
						<a href="#" class="btn-link btn-link__mod">+ More</a>
					</li>
					<li class="col-md-12 col-sm-3 col-xs-6 wow fadeInRight" data-wow-duration="2s">
						<h5>Reference</h5>
						<ul>
							<li><a href="#">Almanacs & Yearbooks</a></li>
							<li><a href="#">Dictionaries & Thesauruses</a></li>
							<li><a href="#">Encyclopedias</a></li>
						</ul>
						<a href="#" class="btn-link btn-link__mod">+ More</a>
					</li> -->
					<!-- <div class="btn-wr text-center">
						<a href="#" class="btn btn-primary btn-primary__mod">See all categories</a>
					</div> -->
				</ul>