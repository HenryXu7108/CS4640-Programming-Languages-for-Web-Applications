<!DOCTYPE html>
<!--
* Homework 4
*
* Computing ID: wx8mcm
* Resources used: [https://cs4640.cs.virginia.edu/homework/homework4.html;https://cs4640.cs.virginia.edu/lectures/examples/trivia-cookies.html ]
-->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wenhao Xu(wx8mcm)">
    <meta name="description" content="Login Page">
    <title>Game Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 15px;">
    <div class="row col-xs-8">
        <h1 class="text-center">Welcome to Wordle </h1>
        <p class="text-center"> Please enter your email and name to start.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <?php
            if (!empty($error_msg)) {
                echo "<div class='alert alert-danger'>$error_msg</div>";
            }
            ?>
            <form action="?command=login" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"/>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"/>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Start Game</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>