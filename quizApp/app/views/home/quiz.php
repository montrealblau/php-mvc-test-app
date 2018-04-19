
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
<h1>Quiz</h1>
<form name="fff" id="quiz" action="/quiz/public/home/result/" method="POST">
	<span class="error" style="display: none;">Complete quiz!.<br></span>
<ul>
<?php 
foreach ($data['questions'] as $question) {
 ?>
    <li class="question"><?php echo $question[1];?>
    	<ul>
    		<?php
	    		foreach ($data['answers'] as $answer) {
					 if ($answer[2] == $question[0]){ ?>
	    				<li>
	    					<input class="answer" type="radio" name="<?php echo $question[0];?>" value="<?php echo $question[0];?>-<?php echo $answer[1];?>">
	    					<?php echo $answer[0];?>
	    				</li>
	    			<?php
	    			}
	    		}
    		?>
    	</ul>
    </li>
<?php     
}
?>
</ul>
<p>Progress = <span id="progress">0</span>%</p>
<input class="btn-success" id="submitbutton" type="submit" name="fff" value="Submit" style="display: none;">  
</form>
<script type="text/javascript">

	var quizForm = document.getElementById("quiz");
	var params = [];
	var result = {};
	var a = 'asd';
	var count = 0;
	var answers = quizForm.getElementsByClassName('answer');
	var questions = quizForm.getElementsByClassName('question');

	for (var i = 1; i < questions.length; i++) {
		questions[i].style.display = 'none';
	}
	


	if (answers != undefined && questions != undefined) {
		for(var i = 0; i < answers.length; i++) {
		    answers[i].onclick = function() {
		    	var progress = 0;

		    	var value = this.value;
		    	var question_id = value.split('-')[0];
		    	var answer_id = value.split('-')[1];
		    	result[question_id] = answer_id;
		    	console.log(result);
		    	for (var i in result) {
		    	    if (result.hasOwnProperty(i)) {
		    	        progress++;
		    	    }
		    	}

		    	for (var i = 0; i < questions.length; i++) {
		    		questions[i].style.display = 'none';
		    	}
		    	document.getElementById('progress').innerHTML = Math.round(100*progress/questions.length);
		    	if (progress === questions.length) {
		    		document.getElementById('submitbutton').style.display = 'block';
		    	}
		    	questions[progress].style.display = 'block';
		    };
		}
	}

	quizForm.onsubmit = function() {
		for (var i in result) {
		    if (result.hasOwnProperty(i)) {
		        count++;
		    }
		}

		if (count !== questions.length) {
			quizForm.getElementsByClassName('error')[0].style.display = "block";
			return false;
		}else{
			var arr =  location.pathname.split('/');
			var user = arr[arr.length-1];
			var quiz = arr[arr.length-2];

			var question_count = 0;
			var correct_count = 0;

			var answers = '';
			for(var key in result){
				correct_count = correct_count + 1 * result[key];
				question_count++;
			}

			var route = location.origin + '/' + 'printful/public/home/result/' + quiz + '/' + user + '/' + question_count  + '/' + correct_count;
			quizForm.action = route;
			return true;
		}
	return false;	
	};

</script>
</div>
</body>
</html>