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
        <a class="navbar-brand" href="?command=homePage" style="padding-left: 20px; text-align: center">Entertain in Cville.</a>
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
            <li class="nav-item">
                <a href="#" class="nav-link " id="theme">Small/Normal</a>
            </li>

        </ul>
    </div>
</nav>
<!--
written by Wenhao Xu
-->


<section style="width: 100%;" class="main">
    <section  style="width: 100%;"  class="row d-flex justify-content-center align-items-center h-100" id="main">
            <img style="width:20%; height:20%" src="pictures/avatar.png" alt="avatar">
            <p class="text-black-50 fw-bold" style="text-align: center">
                <?
                    if(isset($_SESSION["name"])){
                        echo $_SESSION["name"];
                    }
                ?>
            </p>
            <a href="?command=modify_name" class="text-black-50 fw-bold" style="text-align: center">Set Your Name</a>
            <h2 class="scrolltitle">
                My Favourite
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                </svg>
            </h2>

        <table style="width:100%">
            <tr>
                <th>"</th>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Website</th>
            </tr>

            <?php
            if(isset($_SESSION["userCollection"])){
                foreach($_SESSION["userCollection"] as $dt){ ?>
                    <tr>
                        <td><?php echo $dt['id'];?></td>
                        <td><?php echo $dt['id'];?></td>
                        <td><?php echo $dt['name'];?></td>
                        <td><?php echo $dt['phoneNumber'];?></td>
                        <td><?php echo $dt['website'];?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>


        <h2 class="scrolltitle">
                Reviewed
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3381ec" class="bi bi-layout-text-window-reverse" viewBox="0 0 16 16">
                    <path d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"/>
                    <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z"/>
                </svg>
            </h2>
            <div class="scrollable">
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
                <a href="homePage.php">PlaceHolder</a><br>
            </div>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/less@4" ></script>

<script>
    document.getElementById("theme").addEventListener("click", theme);

    function theme(){
        var main = document.getElementById("main");
        main.classList.toggle("small");
    }

</script>
</body>
</html>