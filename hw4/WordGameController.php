<?php
class WordGameController{
    private $command;

    public function __construct($command) {
        $this->command = $command;
    }

    public function run() {
        switch($this->command) {
            case "question":
                $this->question();
                break;
            case "gameover":
                $this->gameover();
                break;
            case "playagain":
                $this->playagain();
                break;
            case "fail":
                $this->fail();
                break;
            case "logout":
                $this->destroySession();
                break;
            default:
                $this->login();
                break;
        }
    }


    private function destroySession() {
        session_destroy();
        include("login.php");
    }
    public function playagain() {
        unset($_SESSION['guessed']);
        unset($_SESSION['char_in_word']);
        unset($_SESSION['char_right_place']);
        unset($_SESSION['guess_num']);
        $_SESSION['answer'] = $this->loadQuestion();
        header("Location: ?command=question");
        include("question.php");
    }
    private function gameover() {
        include("gameover.php");

    }
    private function fail() {
        include("fail.php");
    }
    // Display the login page (and handle login logic)
    public function login() {
        if (isset($_POST["email"]) && !empty($_POST["email"])) { /// validate the email coming in
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["score"] = 0;
            header("Location: ?command=question");
            return;
        }

        include "login.php";

        if(isset($_POST["email"]) && empty($_POST["email"])) {
            $warning = "<br><br>". "<div class='alert alert-danger'> Please enter your email before playing the game! </div>";
            echo $warning;
        }
    }

    // Load a question from the API
    private function loadQuestion() {
        $arrayopt = array(
            "ssl"=>array("verify_peer"=>false, "verify_peer_name"=>false)
        );

        $words = file_get_contents("https://www.cs.virginia.edu/~jh2jf/courses/cs4640/spring2022/wordlist.txt"
            , false, stream_context_create($arrayopt));

        $wordle_array = explode("\n", $words);
        unset($wordle_array[85]);
        return $wordle_array[array_rand($wordle_array)];
    }

    // Display the question template (and handle question logic)
    public function question() {
        if($_SESSION["name"] != NULL) {
            $name = $_SESSION["name"];
        }
        else {
            $name = "John Doe";
        }
        // set user information for the page from the cookie
        $user = [
            "name" => $_SESSION["name"],
            "email" => $_SESSION["email"],
            "score" => $_SESSION["score"]
        ];

        // load the question
        if(!isset($_SESSION['answer'])) {
            $question = $this->loadQuestion();
        }
        else {
            $question = $_SESSION['answer'];
        }

        $message = "";

        // if the user submitted an answer, check it
        if (isset($_POST["answer"])) {
            $game = new Wordle_Game($question);
            $answer = $_POST["answer"];

            if ($game->isequal($answer)) {
                $message = "<div class='alert alert-success'><b>$answer</b> was correct!</div>";

                $user["score"] += 10;
                $_SESSION['score'] = $_SESSION['score'] + 10;

                header("Location: ?command=gameover");
                return;
            } else {
                $message = "<div class='alert alert-danger'><b>$answer</b> was incorrect!</div>";
            }


            $game->guess($answer);



            echo "Characters in the correct places: ";
            foreach ($_SESSION["char_right_place"] as $index => $char) {
                echo ($index+1). ": ". $char. "  ";
            }
            echo "<br>";

            echo "Character in answer: ";
            foreach ($_SESSION['char_in_word'] as $char){
                echo $char." ";
            }
            echo "<br>";

            echo "Prior guesses: <br> ";
            for($i = 1;$i <= count($_SESSION['guessed']); $i++){
                echo $i . ": " . $_SESSION['guessed'][$i-1] . "<br>";
            }

            if($_SESSION['equal'] == true){
                echo "The input word length is equal to the answer";
                echo "<br>";
            }elseif ($_SESSION["longer"] == true){
                echo "The input word length is longer to the answer";
                echo "<br>";
            }else{
                echo "The input word length is shorter to the answer";
                echo "<br>";
            }

            echo $message;
        }

        // update the question information in cookies
        $_SESSION['answer'] = $question;
        include("question.php");
    }


}

class Wordle_Game{
    private $answer;
    public $guessed = array();

    public function __construct($word){
        $this->answer = strtolower($word);
    }

    public function guess($guess_word){
        $guess_word = strtolower($guess_word);
        if(isset($_SESSION['guessed']) && !empty($_SESSION['guessed'])){
            $this->guessed = $_SESSION['guessed'];
        }
        array_push($this->guessed, $guess_word);
        $_SESSION['guessed'] = $this->guessed;


        if(!isset($_SESSION['guess_num'])){
            $_SESSION['guess_num'] = 1;

        }else{
            $_SESSION['guess_num'] += 1;

        }

        //array of character in right place
        $char_right_place = array();
        if(isset($_SESSION['char_right_place']) && !empty($_SESSION['char_right_place'])) {
            $char_right_place = $_SESSION['char_right_place'];
        }
        for($i = 0; $i < min(strlen($guess_word),strlen($this->answer));$i++){
            if($guess_word[$i] == $this->answer[$i]){
                $char_right_place[$i] = $guess_word[$i];
            }

        }
        $_SESSION['char_right_place'] = $char_right_place;

        $char_in_word = array();
        if(isset($_SESSION["char_in_word"]) && !empty($_SESSION["char_in_word"])) {
            $char_in_word = $_SESSION['char_in_word'];
        }
        for($i = 0; $i < strlen($guess_word); $i++) {
            if($guess_word[$i] == $this->answer[0]){
                array_push($char_in_word, $guess_word[$i]);
            }
            if(strpos($this->answer, $guess_word[$i])) {
                array_push($char_in_word, $guess_word[$i]);
            }

        }
        $char_in_word = array_unique($char_in_word);
        $_SESSION['char_in_word'] = $char_in_word;


        $_SESSION['longer'] = strlen($guess_word) > strlen($this->answer);
        $_SESSION['equal'] = strlen($guess_word) == strlen($this->answer);

    }
    public function isequal($guessed){
        if($guessed == $this->answer){
            return true;
        }else{
            return false;

        }
    }
}