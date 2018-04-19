
</!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
<br><br><br>
<h1>Quiz | Take a quiz for free!</h1>
<?=$data['error']?></br>
<div class="row">
<div class="col-md-6 col-md-offset-2">
<div class="input-group">
<form name="registerform" id="register" action="/printful/public/home/register/" method="POST">
<span class="error" style="display: none;">Pick a ussername and choose quiz to continiue!<br></span>
<input class="form-control" type="text" placeholder="name" name="username"><br>
<?php 
foreach ($data['quizzes'] as $value) {
?>	
    	<input id="<?php echo $value[0];?>" type="radio" name="url" value="<?php echo $value[0];?>">
    	<?php echo $value[1];?><br>
<?php     
}
?>
<input class="btn-success" type="submit">
</form>
</div>
</div>
</div>
<script type="text/javascript">
	var registerForm = document.getElementById("register");
	var params = [null,null];
	var rad = registerForm.url;
	registerForm.url[0].att;
	var radio = null;
	for(var i = 0; i < rad.length; i++) {
	    rad[i].onclick = function() {
	    	params[1] = 1 * this.value;
	    };
	}

	registerForm.onsubmit = function() {

		if (params[0] == null && params[1] == null) {
			registerForm.getElementsByClassName('error')[0].style.display = "block";
			return false;
		}else{
			params[0] = registerForm.username.value;
			var route = registerForm.action;
			route += params[1] + "/" + params[0];
			registerForm.action = route;
			return true;
		}
	return false;	
	};

</script>
</div>
</body>
</html>