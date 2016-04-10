
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>SIMPSDKP</title>

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
    <style type="text/css">
    p{
        text-align: justify;
    }
    a.cst{
        color: #26dac3;
        font-weight: bold;
    }
    a.cst:hover{
        color: #fbbe04;
    }
    hr.cst-line {
        margin: 10px;
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
    }
    h2.judul_artikel{
        /*text-transform: lowercase;*/
        line-height: 1em;
    }
    </style>
</head>
<body>
<div class="page">
    @if(Route::currentRouteName() == 'public.visitor.home')

    	@include('layout.addon.public.header_home')

    @elseif(Route::currentRouteName() == 'public.visitor.showContent')

    	@include('layout.addon.public.header_content')
    @else
        @include('layout.addon.public.header_content')
    @endif

    @section('content')
    @show

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
                    <a href="./">Sistem Informasi PSDKP </a>
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
