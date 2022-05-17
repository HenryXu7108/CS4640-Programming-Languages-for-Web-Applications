<!DOCTYPE html>
<!--
Source: https://www.downtowncharlottesville.com/(UVA,jpg)
https://unsplash.com/s/photos/avatar(avatar.png)
https://www.xmple.com/wallpaper/grey-blue-gradient-linear-1920x1080-c2-add8e6-d3d3d3-a-225-f-14-image/(bgi.png)
https://icons.getbootstrap.com/icons/heart-fill/
https://icons.getbootstrap.com/icons/heart/
https://icons.getbootstrap.com/icons/layout-text-window-reverse/
-->
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wenhao Xu(wx8mcm), Xin Sun(xs7tng)">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cs4640.cs.virginia.edu/xs7tng/sprint3/css/account.css">
    <title>Account_Center</title>
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
                <a href="?command=myAccount" class="nav-link "><?php
                    if(isset($_SESSION["name"])){
                        echo $_SESSION["name"];
                    }else{
                        echo "My Account";
                    }
                    ?>
                </a>
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
<section class="main">
    <section class="row d-flex justify-content-center align-items-center h-100" >
        <p class="text-black-50 fw-bold" style="text-align: center"><?=$_SESSION["name"]?></p>
        <form action="?command=modify_name" method="post">
            <div class="mb-3">
                <label for="modify_name" class="form-label">New Name</label>
                <input type="text" class="form-control" id="modify_name" name="modify_name"/>
                <div id="message" class="form-text"></div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="submit" disabled>Update</button>
            </div>
        </form>
    </section>
</section>

<script type="text/javascript">
    document.getElementById("modify_name").addEventListener("keyup", name);
    Valid = () => {
        var mod = document.getElementById("modify_name");
        var modval= mod.value
        var regex = /^[A-Za-z0-9 ]+$/;
        var Valid = regex.test(modval);
        return Valid
    }
    function name(){
        var mod = document.getElementById("modify_name");
        var submit = document.getElementById("submit");
        var message = document.getElementById("message");

        if (!Valid()) {
            mod.classList.add("is-invalid");
            submit.disabled = true;
            message.textContent = "Name should only contain characters, numbers and space";
        } else {
            mod.classList.remove("is-invalid");
            submit.disabled = false;
            message.textContent = "";
        }


    }

</script>
</body>
</html>
