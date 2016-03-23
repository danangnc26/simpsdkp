<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
{{HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}
{{HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}
{{HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}
{{HTML::style('assets/global/plugins/uniform/css/uniform.default.css')}}
{{HTML::style('assets/admin/pages/css/login-soft.css')}}
{{HTML::style('assets/global/css/components-rounded.css')}}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{asset('assets/global/img/icon.png')}}"/>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login" style="background:url('{{asset('assets/global/img/bg_2.jpg')}}')">
<!-- BEGIN LOGO -->
<div class="logo" style="margin-top:0px;">
	{{HTML::image('assets/global/img/logo2.png', 'Logo', ['height' => '150'])}}
	<h2><b>Sistem Informasi PSDKP</b></h2>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content" style="background:url({{asset('assets/global/img/bg-opacity2.png')}})">
	<!-- BEGIN LOGIN FORM -->
	{{Form::open(['route' => 'users.authenticate', 'method' => 'post', 'id' => 'frm-login'])}}
		<!-- <h3 class="form-title">Login to your account</h3> -->
		<div id="err-cont" class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span >
			<div id="err-msg"></div></span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				{{Form::text('username', null, ['id' => 'username', 'class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Username', 'autofocus' => ''])}}
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				{{Form::password('password', ['id' => 'password', 'class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Password'])}}
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			{{Form::checkbox('remember_me', 1, false, ['id' => 'remember_me', 'class' => ''])}} Remember me </label>
			<button class="btn blue pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	{{Form::close()}}
	<!-- END LOGIN FORM -->
	
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2014 &copy; Metronic - Admin Dashboard Template.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
{{HTML::script('assets/global/plugins/jquery.min.js')}}
{{HTML::script('assets/global/plugins/jquery-migrate.min.js')}}
{{HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js')}}
{{HTML::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}
{{HTML::script('assets/global/plugins/backstretch/jquery.backstretch.min.js')}}
{{HTML::script('assets/global/scripts/metronic.js')}}


<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
<script type="text/javascript">
	$('form#frm-login').on('submit', function(event){
		event.preventDefault();
		
		$.post(
          $(this).prop('action'),
          {
              "username" : $('input[name=username]').val(),
              "password" : $('input[name=password]').val(),
              "remember_me" : $('input[name=remember_me]:checked').val()
          },
          function(data)
          {
	          	if(data.status)
	            {
	              location.replace(data.url);
	            }else{
	            	$('#err-msg').text(data.message);
	            	$('#err-cont').show();
	            }
          },
          'json'
        );
	});
</script>
</html>