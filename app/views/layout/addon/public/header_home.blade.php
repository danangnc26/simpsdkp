<!--========================================================
                              HEADER
    =========================================================-->
    <header>
    	<ul class="cb-slideshow" style="z-index:-1;">
        <style type="text/css">
        <?php
        if(Lib::getSliderImages() == null){

        }else{
        $i = 0;
        foreach(Lib::getSliderImages() as $key => $value){
        ?>
        <?php
        if($key == 0){
        ?>
        .cb-slideshow li span { 
            background-image: url("<?php echo asset('uploaded_images/slider/'.$value->gambar_slider) ?>") ;
        }
        <?php
        }else{
        ?>
        .cb-slideshow li:nth-child(<?php echo $key+1 ?>) span { 
            background-image: url("<?php echo asset('uploaded_images/slider/'.$value->gambar_slider) ?>") ;
        }
        <?php
        }
        ?>
        <?php
        }}
        ?>
        </style>
            <li>
            	<span>Image 01</span>
            	<!-- <div>
            		<h1 class="wow fadeIn" data-wow-duration="2s">Slide 1. <br/>
                    	<em class="clr-primary fw-n"></em>
                    </h1>
            	</div> -->
            </li>
            <li>
            	<span>Image 02</span>
            		<!-- <div>
            			<h1 class="wow fadeIn" data-wow-duration="2s">Slide 2. <br/>
	                    	<em class="clr-primary fw-n"></em>
	                    </h1>
            		</div> -->
            </li>
            <li>
            	<span>Image 03</span>
            	<!-- <div>
            		<h1 class="wow fadeIn" data-wow-duration="2s">Slide 3. <br/>
	                    	<em class="clr-primary fw-n"></em>
	                </h1>
            	</div> -->
            </li>
            <li>
            	<span>Image 04</span>
            	<!-- <div>
            		<h1 class="wow fadeIn" data-wow-duration="2s">Slide 4. <br/>
	                    	<em class="clr-primary fw-n"></em>
	                </h1>
            	</div> -->
            </li>
            <li>
            	<span>Image 05</span>
            	<!-- <div>
            		<h1 class="wow fadeIn" data-wow-duration="2s">Slide 5. <br/>
	                    	<em class="clr-primary fw-n"></em>
	                </h1>
            	</div> -->
            </li>
            <li>
            	<span>Image 06</span>
            	<!-- <div>
            		<h1 class="wow fadeIn" data-wow-duration="2s">Slide 6. <br/>
	                    	<em class="clr-primary fw-n"></em>
	                </h1>
            	</div> -->
            </li>
        </ul>
        
        @include('layout.addon.public.menu')

        <section class="well">
            <div class="container text-center">
                <h1 class="wow fadeIn" data-wow-duration="2s">Sistem Informasi Pengetahuan PSDKP <br/>
                <small class="clr-primary fw-n">Pilih kategori pengetahuan yang ingin anda ketahui</small></h1>


                <form class="search-form" action="search.php" method="GET" accept-charset="utf-8">
                    <label class="search-form_label">
                        <span class="fa fa-search"></span>
                        <input class="search-form_input" type="text" name="s" autocomplete="off"
                               placeholder="Search"/>
                        <span class="search-form_liveout"></span>
                    </label>
                    <button class="btn" type="submit">Find now</button>
                </form>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6 text-left wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="block-icon">
                            <div class="icon">
                                <i class="fa fa-ship"></i>
                            </div>
                            <div class="block_caption">
                                <h3 class="fw-b txt-clr1">Kapal Pengawas <br/> <span class="fw-n">
                                   <small>Speedboat</small> </span></h3>
                                <a href="#" class="btn-link">Learn more</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 text-left wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="block-icon">
                            <div class="icon">
                                <i class="fa fa-balance-scale"></i>
                            </div>
                            <div class="block_caption">
                                <h3 class="fw-b txt-clr1">Tindak Pidana <br/> <span class="fw-n">
                                    <small>Data Pelanggaran</small> </span></h3>
                                <a href="#" class="btn-link">Learn more</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 clearboth text-left wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="block-icon">
                            <div class="icon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <div class="block_caption">
                                <h3 class="fw-b txt-clr1">Laporan Kegiatan <br/> <span class="fw-n">
                                   <small>Bulanan, Tahunan</small> </span></h3>
                                <a href="#" class="btn-link">Learn more</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 text-left wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
                        <div class="block-icon">
                            <div class="icon">
                                <i class="fa  fa-line-chart "></i>
                            </div>
                            <div class="block_caption">
                                <h3 class="fw-b txt-clr1">Capaian IKU <br/> <span class="fw-n">
                                    <small>Capaian Harian</small> </span></h3>
                                <a href="#" class="btn-link">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </header>