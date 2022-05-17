<!DOCTYPE html>
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
                        <li><a class="dropdown-item" href="?command=outDoorFitness">Outdoor Recreation</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="?command=logIn" class="nav-link ">Sign In</a>
                </li>

                <li class="nav-item">
                    <a href="?command=signUp" class="nav-link ">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div>

</div>