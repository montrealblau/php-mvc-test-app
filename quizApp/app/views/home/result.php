
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
	<me
</head>
<body>
	<div class="container">
	<h1>Thank you, <?=$data['username']?> !</h1>
	<h2>Your score is: <?=$data['score']?> %</h2>
	<p>You answered correct <?=$data['correct_n']?> out of <?=$data['questin_n']?> questions</p>
	<a href="/printful/public/home/index">another attempt</a>
	</div>
</body>
</html>