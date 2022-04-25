<!DOCTYPE html>
<!--
* Homework 5
*
* Computing ID: wx8mcm
* Resources used: [https://cs4640.cs.virginia.edu/homework/homework4.html;https://cs4640.cs.virginia.edu/lectures/examples/trivia-cookies.html ]
-->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wenhao Xu(wx8mcm)">
    <meta name="description" content="Transaction Page">
    <title>Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed top" aria-label="Main Navigation Bar">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item "> <a href="#" class="nav-link"><?=$_SESSION["email"]?></a></li>
                <li class="nav-item "> <a href="#" class="nav-link"><?=$_SESSION["name"]?></a></li>
                <li class="nav-item"> <a href="?command=transaction" class="nav-link">History</a></li>
                <li class="nav-item"> <a href="?command=new_trans" class="nav-link">Add New Transaction</a></li>
                <li class="nav-item"> <a href="?command=logout" class="nav-link">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 15px;">
    <div class="row col-xs-8">
        <h1 class="text-center">Add New Transaction </h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-4">

            <form action="?command=new_trans" method="post">
                <?php
                if (!empty($error_msg)) {
                    echo "<div class='alert alert-danger'>$error_msg</div>";
                }
                ?>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category"/>
                </div>
                <div class="mb-3">
                    <label for="datee" class="form-label">Date</label>
                    <input type="date" class="form-control" id="datee" name="datee"/>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount"/>

                <div class="mb-3">
                    <label for="debit" >Debit(withdraw)</label>
                    <input type="radio" id="debit" name="type" value="debit"/>

                    <label for="credit">Credit(deposit)</label>
                    <input type="radio" id="credit" name="type" value="credit"/>
                </div>

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
