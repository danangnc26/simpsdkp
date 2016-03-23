<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>S</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	{{HTML::script('assets/js/jquery-1.11.3.min.js')}}
</head>
<body>
{{Form::open(['route' => 'users.authenticate', 'method' => 'post', 'id' => 'frm-login'])}}
	{{Form::text('username', null, ['id' => 'username', 'class' => 'form-control'])}}
	{{Form::password('password', ['id' => 'password', 'class' => 'form-control'])}}
	{{Form::checkbox('remember_me', 1, false, ['id' => 'remember_me', 'class' => ''])}}
	<button>Masuk</button>
{{Form::close()}}


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
</body>
</html>