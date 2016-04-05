				<!-- <h2 class="text-center">Categories</h2> -->
				<?php
				$kategori = CMSKategoriModel::all();
				?>
				@if(empty($kategori) || count($kategori) == 0)
				@else
				<?php
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
						<h5>{{$v1['nama_kategori']}}</h5>
						<ul>
							@foreach($k2 as $v2)
								@if($v2['kategori_utama'] == $v1['id_kategori'])
										<li><a href="{{route('public.visitor.showCategory', Lib::replaceString($v2['nama_kategori']))}}">{{$v2['nama_kategori']}}</a></li>
								@endif
							@endforeach	
						</ul>								
						<a href="#" class="btn-link btn-link__mod">+ More</a>
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