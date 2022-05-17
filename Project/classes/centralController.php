<?php

class centralController{
    private $command;
    private $db;

    public function __construct($command){
        $this->command = $command;
        $this->db = new Database();
    }


    public function run(){
        switch($this->command){
            case "homePage":
                $this->homePage();
                break;
            case "entertainment":
                $this->entertainment();
                break;
            case "details":
                $this->details();
                break;
            case "outDoorRecreation":
                $this->outDoorRecreation();
                break;
            case "addCollection":
                $this->collect();
                break;
            case "fitness":
                $this->fitness();
                break;
            case "myAccount":
                $this->myAccount();
                break;
            case "signUp":
                $this->signUp();
                break;
            case "search":
                $this->search();
                break;
            case "insert":
                $this->insert();
                break;
            case "logOut":
                $this->logout();
            case"modify_name":
                $this->modify_name();
                break;
            case "logIn":
            default:
                $this->login();
                break;
        }
    }

    private function insert(){
        if(isset($_GET["id"])){
            if(isset($_SESSION["userID"])){
                //check whether the item has been previous inserted
                $check = $this->db->query("select * from rating where user_id =? and collection_id=?;", "ss",$_SESSION["userID"] ,$_GET["id"]);
                if($check===false){
                    echo '<script>alert("error checking the collection item")</script>';
                }else if(empty($check)){
                    $insert = $this->db->query("insert into  rating (user_id, collection_id, rating) values (?,?,?);","sss",
                        $_SESSION["userID"] ,$_GET["id"],"0");
                }else{
                    echo '<script>alert("this item has been added")</script>';
                }
            }else{
                echo '<script>alert("Please Log In First")</script>';
            }
        }
        include("templates/Search.php");
    }

    private function details(){
        if(isset($_GET["collectionID"])){
            $collection = $this->db->query("select * from collection where id =?;", "s", $_GET["collectionID"]);
            $_SESSION["collectionForDetailsPage"] = $collection[0];
        }
        include("templates/collectionDetails.php");
    }

    private function modify_name(){
        if(isset($_POST["modify_name"])) {
            $data = $this->db->query("select * from user where email=?;", "s", $_SESSION["email"]);
            $userid = $data[0]['id'];
            $name = $_POST["modify_name"];
            $update = $this->db->query("UPDATE user SET userName = ? WHERE id= ?;", "si", $name, $userid);
            $_SESSION["name"] = $name;
        }
            include("templates/modify_name.php");

    }

    private function collect(){
        if(isset($_SESSION["name"]) && isset( $_SESSION["collectionID"]) && isset($_SESSION["userID"])){
            //Get USER ID and collection id
            $insert = $this->db->query("insert into rating (user_id, collection_id, rating) values (?,?,?);","sss",
                $_SESSION["userID"], $_SESSION["collectionID"],"0");
            if($insert === false){
                echo '<script>alert("error when inserting new collection")</script>';
            }else{
                echo '<script>alert("Add to your collection")</script>';
                return ;
            }
        }
    }

    private function search(){
        if(isset($_POST["searchText"])){
            $search = strtolower($_POST["searchText"]);
            $search = ucfirst($search);
            $data = $this->db->query("select * from collection where tag =?;","s",$search);
            $json = json_encode($data);
            if($data===false){
                echo "Error when finding the data";
            }else if(!empty($data)){
                $_SESSION["searchResult"] = $data;
            }else{
                echo "Cannot find ".$search;
            }
        }
        include("templates/Search.php");
    }


    private function entertainment(){
        include("templates/entertainment.php");
    }

    private function outDoorRecreation(){
        include("templates/outdoorRecreation.php");
    }

    private function fitness(){
        include("templates/fitness.php");
    }


    private function signUp(){
        $regex  = "/^([A-Za-z0-9]+\.*-*\+*_*)+@[A-Za-z0-9]+(\.[A-Za-z0-9]+)+$/";
        if(isset($_POST["signUpEmail"]) && isset($_POST["signUpName"]) && isset($_POST["signUpPassword"]) && isset($_POST["signUpConfirmPassword"]) && $_POST["signUpEmail"]!="" && $_POST["signUpName"]!=""){

            $email = $_POST["signUpEmail"];
            $res = preg_match($regex,$_POST["signUpEmail"]);
            if($res == 0){
                echo "email format is not recognized, please check your entering. ";
            }
            $name = $_POST["signUpName"];
            $password = $_POST["signUpPassword"];
            $confirmPassword = $_POST["signUpPassword"];
            $data = $this->db->query("select * from user where email=?;","s",$email);
            if($data===false){
                echo "error when finding the email in the account";
            }else if(!empty($data)){
                //then the user exists already.
                echo "the user exists already";
            }else{
                // the account does not exists. check whether the password == confirm password
                if($password == $confirmPassword){
                    $insert = $this->db->query("insert into user (userName, email, password) values (?,?,?);","sss",
                        $name,$email,password_hash($password,PASSWORD_DEFAULT));
                    if($insert === false){
                        echo "error when inserting new user";
                    }else{
                        echo "Account created successfully";
                        header("Location: ?command=logIn");
                        return ;
                    }
                }else{
                    echo "password and confirm password are different";
                }
            }
        }
        echo "All Columns must be set";
        include("templates/sign_up.php");
    }

    private function homePage(){

        include("templates/homePageLoggedIn.php");

    }

    private function myAccount(){
        //extract data from database
        if(isset($_SESSION["userID"])){
            $return = array();
            $data = $this->db->query("select * from rating where user_id = ?;","s",$_SESSION["userID"]);
            if(!empty($data)){
                foreach($data as $dt){
                    array_push($return,$dt["collection_id"]);
                }
                $_SESSION["userCollection"] = array();
                foreach($return as $dt){
                    $collectionInfo = $this->db->query("select * from collection where id = ?;","s",$dt);
                    if(!empty($collectionInfo)){
                        array_push($_SESSION["userCollection"],$collectionInfo[0]);
                    }
                }
               /*$collectionInfo = $this->db->query("select * from collection where id in (?);",null,implode("','",$return));
               $_SESSION["userCollection"] = $collectionInfo;*/

            }
        }
        include("templates/account_center.php");
    }

    private function logout(){
        session_destroy();
    }



    private function login(){
        if(isset($_POST["signInEmail"]) && isset($_POST["signInPassword"])){
         //   $_SESSION["email"] = $_POST["signInEmail"];

            $data = $this->db->query("select * from user where email = ?;","s",$_POST["signInEmail"]);
            if($data === false){
                echo "Error when finding the user";
            }else if(!empty($data)){
                //data is not empty, then check the password
                if(password_verify($_POST["signInPassword"],$data[0]["password"])){
                    $_SESSION["name"] = $data[0]["userName"];
                    $_SESSION["email"] = $_POST["signInEmail"];
                    $_SESSION["userID"] = $data[0]["id"];
                    header("Location: ?command=homePage"); //Edit the command here
                    return;
                }else{
                    echo '<script>alert("Wrong Password")</script>';
                }
            }else{
                //data is empty, then we have to insert
                echo '<script>alert("Cannot find the email in our database. Please register one account in sign up page.")</script>';
            }
        }

        include("templates/sign_in.php");
    }



}

