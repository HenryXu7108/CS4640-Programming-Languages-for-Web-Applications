<!DOCTYPE html>
<!--
Source: https://www.downtowncharlottesville.com/(UVA,jpg)
https://unsplash.com/s/photos/avatar(avatar.png)
https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-navbar.php
-->
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wenhao Xu(wx8mcm), Xin Sun(xs7tng)">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cs4640.cs.virginia.edu/xs7tng/sprint3/css/sign_up.css">
    <title>Sign In Page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!--
navbar written by Wenhao Xu and Xin Sun
-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed top" aria-label="Main Navigation Bar">
    <div>
        <a class="navbar-brand" href="homePage.php" style="padding-left: 20px; text-align: center">Entertain in Cville.</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="justify-content: right" id="navbarCollapse">
        <ul class="navbar-nav mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="?command=homePage">Homepage</a>
            </li>

            <li class="nav-item">
                <a href="?command=search" class="nav-link ">Search Page</a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"  aria-expanded="false">Categories <span class="caret"></span></a>
                <ul class="dropdown-menu nav-item " >
                    <li><a class="dropdown-item" href="?command=entertainment">Entertainment</a></li>
                    <li><a class="dropdown-item" href="?command=fitness">Fitness</a></li>
                    <li><a class="dropdown-item" href="?command=outDoorRecreation">Outdoor Recreation</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="?command=logIn" class="nav-link ">Sign In</a>
            </li>

            <li class="nav-item">
                <a href="?command=myAccount" class="nav-link "> <?php if(!isset($_SESSION["name"])){
                        echo "My Account";
                    }else{
                        echo $_SESSION["name"];
                    }
                    ?></a>
            </li>
            <li class="nav-item">
                <a href="?command=logOut" class="nav-link ">
                    <?php if(isset($_SESSION["name"])){
                        echo "Log Out";
                    }
                    ?>
                </a>
            </li>

        </ul>
    </div>
</nav>

<form action="?command=signUp" method="post"  onsubmit="return validate();">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-light text-black" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
                            <div class="form-outline form-black mb-4">
                                <label class="form-label" for="email" >Email</label>
                                <input type="email" id="email" class="form-control form-control-lg" name="signUpEmail"/>
                            </div>
                            <div class="form-outline form-black mb-4">
                                <label class="form-label" for="text">User Name</label>
                                <input type="text" id="text" class="form-control form-control-lg"  name="signUpName" />
                            </div>
                            <div class="form-outline form-black mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg" name="signUpPassword" />
                                <div id="pwhelp" class="form-text"></div>
                            </div>
                            <div class="form-outline form-black mb-4">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" id="confirm" class="form-control form-control-lg" name="signUpConfirmPassword"/>
                                <div id="message" class="form-text"></div>
                            </div>
                            <button class="btn btn-outline-dark btn-lg px-5" id="submit" type="submit" disabled>Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/less@4" ></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<script>
    document.getElementById("password").addEventListener("keyup", passwordValidate);
    document.getElementById("confirm").addEventListener("keyup", confirm_passwordValidate);

    function validate() {
        var email = document.getElementById("email").value;
        var pass = document.getElementById("password").value;

        if (email.length > 0 && pass.length > 5) {
            document.getElementById("submit").disabled = false;
            return true;

        }

        alert("Please enter a long enough email and password.")
        return false;
    }


    function passwordValidate() {
        var pass = document.getElementById("password");
        var submit = document.getElementById("submit");
        var pwhelp = document.getElementById("pwhelp");
        var passval = pass.value;
        if (passval.length < 8) {
            pass.classList.add("is-invalid");
            submit.disabled = true;
            pwhelp.textContent = "Please enter a 8-character password.";
        } else {
            pass.classList.remove("is-invalid");
            pwhelp.textContent = "";
        }

    }

    function confirm_passwordValidate(){
        var pass = document.getElementById("password");
        var confirm = document.getElementById("confirm");
        var message = document.getElementById("message");
        var passval = pass.value;
        var confirmval = confirm.value;
        if(passval !== confirmval){
            confirm.classList.add("is-invalid");
            submit.disabled = true;
            message.textContent = "Password entered must be same as above"
        }else{
            confirm.classList.remove("is-invalid");
            submit.disabled = false;
            message.textContent = ""
        }

    }




</script>
</body>
</html>