<?php
class FinanceController
{
    private $command;

    private $db;
    public function __construct($command)
    {
        $this->command = $command;

        $this->db = new Database();
    }

    public function run() {
        switch($this->command) {
            case "transaction":
                $this->transaction();
                break;
            case "logout":
                $this->destroySession();
                break;
            case "new_trans":
                $this->new_trans();
                break;
            default:
                $this->login();
                break;
        }
    }
    private function new_trans(){
        if(isset($_POST["category"]) && empty($_POST["category"])) {
            $error_msg = "<br><br>". "<div class='alert alert-danger'> Please enter category</div>";
        }
        if(isset($_POST["datee"]) && empty($_POST["datee"])) {
            $error_msg = "<br><br>". "<div class='alert alert-danger'> Please enter your date</div>";
        }
        if(isset($_POST["amount"]) && empty($_POST["amount"])) {
            $error_msg = "<br><br>". "<div class='alert alert-danger'> Please enter your amount</div>";
        }
        if(isset($_POST['type']) && empty($_POST["type"])){
            $error_msg = "<br><br>". "<div class='alert alert-danger'> Please choose debit/credit</div>";
        }
        if(isset($_POST['type']) && $_POST['type'] == "credit" && $_POST["amount"] < 0){
            $error_msg = "<br><br>". "<div class='alert alert-danger'> Amount for deposit must be positive</div>";
        }
        if(isset($_POST['type']) && $_POST['type'] == "debit" && $_POST["amount"] > 0){
            $error_msg = "<br><br>". "<div class='alert alert-danger'> Amount for withdraw must be negative</div>";
        }
        $go1 = $_POST['type'] == "credit" && $_POST["amount"] > 0;
        $go2 = $_POST['type'] == "debit" && $_POST["amount"] < 0;



        if (isset($_POST["amount"]) && !empty($_POST["category"]) && !empty($_POST["datee"]) && !empty($_POST["amount"]) && isset($_POST['type'])) {
            if ($go1 == 1 | $go2 == 1) {
                $data = $this->db->query("select * from user where email=?;", "s", $_SESSION["email"]);
                $userid = $data[0]['id'];

                $dates = date('Y-m-d', strtotime($_POST['datee']));

                $insert = $this->db->query("insert into transaction (user_id, category, datee, amount) values (?, ?, ?,?);
                    ", "issi", $userid, $_POST["category"], $dates, $_POST["amount"]);

                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    $message = "<br><br>" . "<div class='alert alert-info'> New transaction uploaded</div>";
                    echo $message;

                }
            }
            include("template/new_trans.php");


        }
    }
    private function destroySession() {
        session_destroy();
    }

    private function transaction(){
        include("template/transaction.php");
        $data = $this->db->query("select * from user where email=?;","s",$_SESSION["email"]);
        $userid =  $data[0]['id'];
        $data = $this->db->query("select * from transaction where user_id=?;", "i" ,$userid);

        if (!isset($data[0])) {
            echo("No transaction in the database");
        }else{
            $total = 0;
            foreach ($data as $row){
                $total += $row['amount'];
                echo str_repeat('&nbsp;', 20);
                echo $row['datee'].str_repeat('&nbsp;', 40);
                echo $row['category']. str_repeat('&nbsp;', 100);
                echo $row['amount'].str_repeat('&nbsp;', 80);
                echo $total;
                echo "<br>";

            }

            echo "Account Balance:";
            echo $total;


        }




    }

    public function login(){
        if(isset($_POST["email"]) && empty($_POST["email"])) {
        $warning = "<br><br>". "<div class='alert alert-danger'> Please enter your email</div>";
        echo $warning;
        }
        if(isset($_POST["name"]) && empty($_POST["name"])) {
            $warning = "<br><br>". "<div class='alert alert-danger'> Please enter your name</div>";
            echo $warning;
        }
        if(isset($_POST["password"]) && empty($_POST["password"])) {
            $warning = "<br><br>". "<div class='alert alert-danger'> Please enter your password</div>";
            echo $warning;
        }

        if (isset($_POST["email"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["password"])) {
            $data = $this->db->query("select * from user where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error checking for user";
            } else if (!empty($data)) {
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    $_SESSION["name"] = $_POST["name"];
                    $_SESSION["email"] = $_POST["email"];
                    header("Location: ?command=transaction");
                } else {
                    $error_msg = "Wrong password";
                }
            } else { // empty, no user found
                // TODO: input validation
                // Note: never store clear-text passwords in the database
                //       PHP provides password_hash() and password_verify()
                //       to provide password verification
                $insert = $this->db->query("insert into user (email, name, password) values (?, ?, ?);",
                    "sss", $_POST["email"], $_POST["name"],
                    password_hash($_POST["password"], PASSWORD_DEFAULT));
                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    $_SESSION["name"] = $_POST["name"];
                    $_SESSION["email"] = $_POST["email"];

                    header("Location: ?command=transaction");
                }
            }
        }
        include("template/login.php");
    }


















}