
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Home</title>

    <!-- Bootstrap -->
    {{HTML::style('assets/pbl/css/bootstrap.css')}}
    {{HTML::style('assets/pbl/css/style.css')}}
    <!-- Links -->
   
    {{HTML::style('assets/pbl/css/search.css')}}
    <!--JS-->
    {{HTML::script('assets/pbl/js/jquery.js')}}
    {{HTML::script('assets/pbl/js/jquery-migrate-1.2.1.min.js')}}
    {{--HTML::script('assets/pbl/js/')--}}

    {{--HTML::style('assets/pbl/plugins/slideshow/css/demo.css')--}}
    {{HTML::style('assets/pbl/plugins/slideshow/css/style1.css')}}
    {{HTML::script('assets/pbl/plugins/slideshow/js/modernizr.custom.86080.js')}}
    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    {{HTML::script('assets/pbl/js/device.min.js')}}
</head>
<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header>
    	<ul class="cb-slideshow" style="z-index:-1;">
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
        <div id="stuck_container" class="stuck_container" style="margin-top:0px;">
            <nav class="navbar navbar-default navbar-static-top ">
                <div class="container">
                    <div class="navbar-header">
                        <h1 class="navbar-brand">
                            <a href="./">Sistem Informasi PSDKP </a>
                        </h1>
                    </div>

                    <div class="navbar-left">
                        <ul class="navbar-nav sf-menu" data-type="navbar">
                            <li class="active">
                                <a href="./">Home</a>
                            </li>
                            <li class="dropdown">
                                <a href="index-1.html">In Action</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Lorem ipsum dolor </a>
                                    </li>
                                    <li>
                                        <a href="#">Ait amet conse </a>
                                    </li>
                                    <li>
                                        <a class="act" href="#">Ctetur adipisicing elit</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#">Latest</a>
                                            </li>
                                            <li>
                                                <a href="#">Archive</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Sed do eiusmod </a>
                                    </li>
                                    <li>
                                        <a href="#">Tempor incididunt </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="index-2.html">Publication </a>
                            </li>
                            <li>
                                <a href="index-3.html">E-Report</a>
                            </li>

                            <li>
                                <a href="index-4.html">News</a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-wr-header">
                        <a href="#" class="btn btn-default">Create an account</a>
                        <a href="#" class="btn btn-primary">Sign In</a>
                    </div>
                </div>
            </nav>
        </div>

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

    <!--========================================================
                              CONTENT
    =========================================================-->

    <main>

        <section class="well6 bg-alt">
            <div class="container center767">
                <div class="row">
                    <div class="col-md-9" style="">
                    	<h2 class="text-center">Featured Books</h2>
                    	<div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="2s">
	                        <div class="thumbnail">
	                            <a href="#"><img src="assets/pbl/images/page-1_img01.jpg" alt=""/></a>

	                            <div class="caption">
	                                <h5>Incididunt ut labore et dolore</h5> col-xs-6
	                                <dl>
	                                    <dt>SBN:</dt>
	                                    <dd>8523694</dd>

	                                    <dt>Author(s):</dt>
	                                    <dd>Conse ctetur adipisicing</dd>

	                                    <dt>Edition:</dt>
	                                    <dd>Elit sed do eiusmod tempor</dd>

	                                    <dt>Binding:</dt>
	                                    <dd>Incididunt ut labore</dd>
	                                </dl>

	                                <a href="#" class="btn btn-primary btn-primary__mod">Learn more</a>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="2s">
	                        <div class="thumbnail">
	                            <a href="#"><img src="assets/pbl/images/page-1_img02.jpg" alt=""/></a>

	                            <div class="caption">
	                                <h5>Incididunt ut labore et dolore</h5>
	                                <dl>
	                                    <dt>SBN:</dt>
	                                    <dd>8523694</dd>

	                                    <dt>Author(s):</dt>
	                                    <dd>Conse ctetur adipisicing</dd>

	                                    <dt>Edition:</dt>
	                                    <dd>Elit sed do eiusmod tempor</dd>

	                                    <dt>Binding:</dt>
	                                    <dd>Incididunt ut labore</dd>
	                                </dl>

	                                <a href="#" class="btn btn-primary btn-primary__mod">Learn more</a>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-md-3 col-sm-6 col-xs-6 clearboth wow fadeInUp " data-wow-duration="2s">
	                        <div class="thumbnail">
	                            <a href="#"><img src="assets/pbl/images/page-1_img03.jpg" alt=""/></a>

	                            <div class="caption">
	                                <h5>Incididunt ut labore et dolore</h5>
	                                <dl>
	                                    <dt>SBN:</dt>
	                                    <dd>8523694</dd>

	                                    <dt>Author(s):</dt>
	                                    <dd>Conse ctetur adipisicing</dd>

	                                    <dt>Edition:</dt>
	                                    <dd>Elit sed do eiusmod tempor</dd>

	                                    <dt>Binding:</dt>
	                                    <dd>Incididunt ut labore</dd>
	                                </dl>

	                                <a href="#" class="btn btn-primary btn-primary__mod">Learn more</a>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="2s">
	                        <div class="thumbnail">
	                            <a href="#"><img src="assets/pbl/images/page-1_img04.jpg" alt=""/></a>

	                            <div class="caption">
	                                <h5>Incididunt ut labore et dolore</h5>
	                                <dl>
	                                    <dt>SBN:</dt>
	                                    <dd>8523694</dd>

	                                    <dt>Author(s):</dt>
	                                    <dd>Conse ctetur adipisicing</dd>

	                                    <dt>Edition:</dt>
	                                    <dd>Elit sed do eiusmod tempor</dd>

	                                    <dt>Binding:</dt>
	                                    <dd>Incididunt ut labore</dd>
	                                </dl>

	                                <a href="#" class="btn btn-primary btn-primary__mod">Learn more</a>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="col-md-3" style="">
                    	<h2 class="text-center">Categories</h2>
                    	<ul class="content-list row">
		                    <li class="col-md-12 col-sm-3 col-xs-6 wow fadeInRight" data-wow-duration="2s">
		                        <h5>Arts & Photography</h5>
		                        <ul>
		                            <li><a href="#">Design & Decorative Arts</a></li>
		                            <li><a href="#">Art History & Criticism Textbooks</a></li>
		                            <li><a href="#">Other Media</a></li>
		                        </ul>
		                        <a href="#" class="btn-link btn-link__mod">+ More</a>
		                    </li>
		                    <li class="col-md-12 col-sm-3 col-xs-6 wow fadeInRight" data-wow-duration="2s">
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
		                    </li>
		                    <div class="btn-wr text-center">
		                     	<a href="#" class="btn btn-primary btn-primary__mod">See all categories</a>
			                </div>
		                </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="well3 bg-primary">
            <div class="container">
                <h2 class="text-center txt-clr1">About Us</h2>
                <ul class="row index-list">
                    <li class="col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-clr1"><a href="#">Incididunt ut labore et dolore</a></h5>

                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet
                            conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex.</p>
                    </li>

                    <li class="col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-clr1"><a href="#">Incididunt ut labore et dolore</a></h5>

                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet
                            conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex.</p>
                    </li>

                    <li class="col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-clr1"><a href="#">Incididunt ut labore et dolore</a></h5>

                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet
                            conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex.</p>
                    </li>
                </ul>
            </div>
        </section>

    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
    <footer>
        <section>
            <div class="container center767">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
                        <h5 class="txt-clr1 fw-n">The Company</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Newsroom</a></li>
                            <li><a href="#">Our Blog</a></li>
                        </ul>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                        <h5 class="txt-clr1 fw-n">Support</h5>
                        <ul>
                            <li><a href="#">Rental Agreement</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">How to Return</a></li>
                            <li><a href="#">Extending Rentals</a></li>
                            <li><a href="#">Shipping Details</a></li>
                            <li><a href="#">Custom Rental Store</a></li>
                            <li><a href="#">Affiliates</a></li>
                        </ul>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                        <h5 class="txt-clr1 fw-n">What's Hot</h5>
                        <ul>
                            <li><a href="#">Popular Textbooks</a></li>
                            <li><a href="#">Top Rented Textbooks</a></li>
                            <li><a href="#">Rent Textbooks</a></li>
                            <li><a href="#">All Categories</a></li>
                            <li><a href="#">Top Searches</a></li>
                            <li><a href="#">Customer Quotes</a></li>
                            <li><a href="#">Coupons</a></li>
                        </ul>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                        <h5 class="txt-clr1 fw-n">Follow Us</h5>
                        <ul class="social">
                            <li><a class="fa fa-facebook" href="#">Facebook</a></li>
                            <li><a class="fa fa-twitter" href="#">Twitter</a></li>
                            <li><a class="fa fa-skype" href="#">Skype</a></li>
                        </ul>
                    </div>

                    <div class="col-md-offset-1 col-md-3 col-sm-12 col-xs-12 fb-plug-wr">
                        <!-- <div class="fb-page" data-href="https://www.facebook.com/TemplateMonster?fref=ts"
                             data-width="270" data-height="225" data-hide-cover="false" data-show-facepile="true"
                             data-show-posts="false">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/TemplateMonster?fref=ts"><a
                                        href="https://www.facebook.com/TemplateMonster?fref=ts">TemplateMonster</a>
                                </blockquote>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

        <hr/>

        <div class="container">
                <h2 class="navbar-brand">
                    <a href="./">Rental book </a>
                </h2>
            <p class="rights">
                 &#169; <span id="copyright-year"></span>.
                <a href="index-5.html">Privacy Policy</a>
                <!-- {%FOOTER_LINK} -->
            </p>
        </div>

    </footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{HTML::script('assets/pbl/js/bootstrap.min.js')}}
{{HTML::script('assets/pbl/js/tm-scripts.js')}}
<!-- </script> -->
</body>
</html>
