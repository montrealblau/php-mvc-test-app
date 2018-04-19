<?php
class Home extends Controller
{
	public function index($error = '') {

		$user = $this->model('User');
		if ($error == 'error1') {
			$error = 'User already exists!';
		}else{
			$error = '';
		}
		$user->error = $error;
		$user->quizzes = [];

		$dbCon = Db::getInstance();
		$sql = 'SELECT * FROM quizzessTable';
		$stmt = $dbCon->prepare($sql);
		$stmt->execute();

		while ($row = $stmt->fetch())
		{
		   array_push($user->quizzes, [$row[0], $row[1]]);
		}

		$this->view('home/index', [
			'error' => $user->error,
			'quizzes' => $user->quizzes
		]);
	}
	public function register($test = '', $user = '') {
		if ($user == '' || $test == '') {
			header("Location: /printful/public/home/index");
			die();
		}else{
			header("Location: /printful/public/home/quiz/" . $test . "/" . $user . "");
			die();
		}
	} 

	public function result() {

		$args = func_get_args();

		$quiz_number	= $args[0];
		$username 		= $args[1];
		$questin_n		= $args[2];
		$correct_n 		= $args[3];
		$score = $correct_n / $questin_n * 100;

		$user = $this->model('User');

		$user->score = $score;
		$user->username = $username;
		$user->questin_n = $questin_n;
		$user->correct_n = $correct_n;

		$dbCon = Db::getInstance();

		$sql = "INSERT INTO usersTable (user_name) VALUES ('$username')";

		$stmt = $dbCon->prepare($sql);
		$stmt->execute();

		$sql = "INSERT INTO resultsTable (user_name, score) VALUES ('$username','$score')";

		$stmt = $dbCon->prepare($sql);
		$stmt->execute();

		$this->view('home/result', [
			'questin_n' => $user->questin_n,
			'correct_n' => $user->correct_n,
			'score' => $user->score,
			'username' => $user->username
		]);

	}

	public function quiz($id = '',$username = '') {

		$user->questions = [];
		$user->answers = [];		

		$dbCon = Db::getInstance();

		$sql = 'SELECT user_name FROM usersTable';
		$stmt = $dbCon->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch())
		{
		   if($row[0] === $username){
		   	header("Location: /printful/public/home/index/error1");
		   	die();
		   }
		}



		$dbCon = Db::getInstance();

		$sql = "SELECT * FROM questionsTable WHERE quizz_id = '$id'";

		$stmt = $dbCon->prepare($sql);
		$stmt->execute();

		while ($row = $stmt->fetch())
		{
		   array_push($user->questions, [$row[0],$row[1]]);
		}

		foreach ($user->questions as $question) {

			$sql = "SELECT * FROM answersTable WHERE question_id = '$question[0]'";

			$stmt = $dbCon->prepare($sql);
			$stmt->execute();

			while ($row = $stmt->fetch())
			{
			   array_push($user->answers, [$row[1],$row[3],$row[2]]);
			}
		}

		$this->view('home/quiz', [
			'questions' => $user->questions,
			'answers' => $user->answers
		]);

	}
}