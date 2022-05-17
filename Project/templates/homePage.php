<!--
Source: https://www.theoutbound.com/virginia/kayaking/kayak-beaver-creek-lake/photos# (kayaking photo)
https://www.eventective.com/charlottesville-va/bowlero-charlottesville-686866.html (bowling page)
https://virginiasports.com/birdwood-golf-course/ (golf photo)

https://virginiahotairballoon.com/ (view2)
https://www.charlottesville.gov/ (view1)
https://www.rbiva.com/project/university-of-virginia-rotunda/ (view3)
https://www.downtowncharlottesville.com/(UVA,jpg)
https://unsplash.com/s/photos/avatar(avatar.png)
https://www.xmple.com/wallpaper/grey-blue-gradient-linear-1920x1080-c2-add8e6-d3d3d3-a-225-f-14-image/(bgi.png)
https://icons.getbootstrap.com/icons/heart-fill/
https://icons.getbootstrap.com/icons/heart/
https://icons.getbootstrap.com/icons/layout-text-window-reverse/

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wenhao Xu(wx8mcm), Xin Sun(xs7tng)">
    <!-- URL:https://cs4640.cs.virginia.edu/wx8mcm/project/-->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cs4640.cs.virginia.edu/xs7tng/sprint3/css/main.css">
    <title>Homepage</title>
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
                <a href="?command=logIn" class="nav-link ">Sign In</a>
            </li>
            <li class="nav-item">
                <a href="?command=myAccount" class="nav-link ">
                    My Account
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- slideShow -->
<div class=" slideShowContainer" style="height:35%">
    <div class="slideStyle " style="height: 100%">
        <img src="https://cs4640.cs.virginia.edu/xs7tng/sprint3/pictures/view1.jpeg" style="width:100%" alt="view1">
    </div>
    <div class="slideStyle" style="height: 100%">
        <img src="https://cs4640.cs.virginia.edu/xs7tng/sprint3/pictures/view2.jpeg" style="width:100%" alt="view2">
    </div>
    <div class="slideStyle" style="height: 100%">
        <img src="https://cs4640.cs.virginia.edu/xs7tng/sprint3/pictures/view3.jpeg" style="width:100%" alt="view3">
    </div>
    <a class="previous" onclick="addSlide(-1)">&#10094;</a>
    <a class="next" onclick="addSlide(1)">&#10095;</a>
    <h1 style="color:white" class="textCentered">Explore Fun Activities in Charlottesville.</h1>
    <form class="textUnderImg" action="?command=search">
        <input style=" border-radius: 20px;background-color: white; font-weight: bold;" class="button font " type="submit" value="Get Started"/>
    </form>
</div>

<div class="p-5 mb-10 " style="background-color: black">
    <div class="row">
        <div style="padding: 20px" class="col-md-7">
            <div style="color:white" >
                <h2 class="smaller">Indoor Entertainment</h2>
                <h3 class="smaller">Click the Image to learn more about entertainment in Cville.</h3>
                <br>
                <p class="smaller">#Bowling #Escape Room #Movie #Arcade</p>
            </div>
        </div>
        <a style="text-align: center;" class="col-md-5" href="#">
            <img class="display imgCentered" height="300" src="https://cs4640.cs.virginia.edu/xs7tng/sprint3/pictures/bowling.jpeg" alt="bowling">
        </a>
    </div>

    <hr style="color:white">
    <div class="row">
        <div style="padding:20px" class="col-md-7 order-md-2">
            <div style="color:white">
                <h2 class="smaller"> Fitness</h2>
                <h3 class="smaller">Explore fitness activities in Cville by clicking the image.  </h3>
                <br>
                <p class="smaller">#Kayaking #Hiking #Trails #Dancing </p>
            </div>
        </div>
        <a style="text-align: center;" class="col-md-5" href="#">
            <img class="display imgCentered" height="300" src="https://cs4640.cs.virginia.edu/xs7tng/sprint3/pictures/kayaking.jpeg" alt="kayaking">
        </a>
    </div>

    <hr style="color:white">
    <div class="row">
        <div style="padding:20px" class="col-md-7">
            <div style="color:white">
                <h2 class="smaller">Outdoor Recreation</h2>
                <h3 class="smaller">Find out the outdoor recreation in Cville.</h3>
                <br>
                <p class="smaller">#Golf #Monticello</p>
            </div>
        </div>
        <a style="text-align: center;" class="col-md-5" href="#">
            <img class="display imgCentered" height="300" src="https://cs4640.cs.virginia.edu/xs7tng/sprint3/pictures/golf.jpeg" alt="golf">
        </a>
    </div>

    <hr style="color:white">

    <div class="row" style=" color:white">
        <div style="text-align: center" class="col-md-3">
            <h3 class="smaller">Entertainment</h3>
            <h3 class="smaller">In</h3>
            <h3 class="smaller">Charlottesville</h3>
        </div>
        <div class="col-md-3">
            <p class="smaller">Entertainment</p>
            <p class="smaller">Fitness</p>
            <p class="smaller">Outdoor Recreation</p>
            <p class="smaller">More Fun</p>
        </div>
        <div class="col-md-3">
            <p class="smaller">Homepage</p>
            <p class="smaller">Search Page</p>
            <p class="smaller">Sign In</p>
            <p class="smaller">My Account</p>
        </div>
        <div class="col-md-3">
            <p class="smaller">FAQ</p>
            <p class="smaller">Privacy Notice</p>
            <p class="smaller">Terms of Use</p>
            <p class="smaller">Contact us</p>
        </div>

    </div>

    <footer style="text-align: center">
        <p>
            <small class="copyright" style="color:black; font-size: 40px">
                &copy; Wenhao Xu & Xin Sun
            </small>
            <br>
            <small class="copyright" style="color:white; font-size: 10px">
                &copy; Wenhao Xu & Xin Sun
            </small>
        </p>
    </footer>
</div>

<script>
    //Call function
    var pageNumber = 1;
    slideShow(pageNumber);

    function addSlide(num){
        slideShow(pageNumber+=num);
    }

    //Write function slideshow
    function slideShow(num){
        var i ;
        var slide = document.getElementsByClassName("slideStyle");
        if(num>slide.length){
            pageNumber = 1;
        }
        if(num<1){
            pageNumber = slide.length;
        }
        for(i = 0; i<slide.length;i++){
            slide[i].style.display="none";
        }
        slide[pageNumber-1].style.display = "block";

    }
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
</body>
</html>