<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wenhao Xu(wx8mcm), Xin Sun(xs7tng)">
    <title>Search Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
</script>

<script>
   /* var result = null;
     $(document).ready(function(){
        $("button#search").click(function(){
            // instantiate the object
            var ajax = new XMLHttpRequest();
            //searchInput
            var searchInput = $("#searchInput").val();
            //document.getElementById("test").innerHTML = searchInput;
            // open the request
            ajax.open("GET", "?searchInput="+searchInput,true);
            // ask for a specific response
            ajax.responseType = "json";
            // send the request
            ajax.send();

            document.getElementById("success").innerHTML = this.response;

            // What happens if the load succeeds
            ajax.addEventListener("load", function() {
                // set question
                if (this.status == 200) { // worked
                    result = this.response;
                    document.getElementById("myTable").innerHTML = result;
                }
            });
            // What happens on error
            ajax.addEventListener("error", function() {
                document.getElementById("test").innerHTML =
                    "<div class='alert alert-danger'>An Error Occurred</div>";
            });

        })
     });*/
</script>

<body>
<!--
navbar written by Wenhao Xu and Xin Sun
-->

<div id="test"></div>
<br>
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
                <a href="?command=signUp" class="nav-link ">Sign Up</a>
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


<br><br><br>
<!-- Search form -->
<form class="form-inline d-flex justify-content-center md-form form-sm mt-0" action="?command=search" method="post">
    <input class="form-control form-control-sm ml-3 w-75" type="text" id="searchText" placeholder="Search for categories. i.e. Fitness, Outdoor, Entertainment"
           aria-label="Search" name="searchText">
    <button class="btn btn-outline-dark btn-lg px-5" type="submit" id="submit" >Search</button>
</form>

<!--<form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
    <input class="form-control form-control-sm ml-3 w-75" type="text" id="searchText" placeholder="Search for categories. i.e. Fitness, Outdoor, Entertainment"
           aria-label="Search" name="searchText">
    <button class="btn btn-outline-dark btn-lg px-5" onclick="searchAjax()" type="button" id="search" >Search</button>
</form> -->

<div class="form-inline d-flex justify-content-center md-form form-sm mt-0" id="message" class="form-text"></div>
<br><br><br><br>
<h3>Search Result:</h3>
<hr>

<table style="width:100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Website</th>
    </tr>

  <?php
    if(isset($_SESSION["searchResult"])){
        foreach($_SESSION["searchResult"] as $dt){ ?>
            <tr>
                <td><?php echo $dt['id'];?></td>
                <td><?php echo $dt['name'];?></td>
                <td><?php echo $dt['phoneNumber'];?></td>
                <td><?php echo $dt['website'];?></td>
                <td><a href='?command=insert&id=<?php echo $dt['id']?>'> Save to My Favourite</a><td>
            </tr>

   <?php
        }
    }
    ?>
</table>

<table id="myTable"></table>


<script>
   /* function addCollection(){
        window.location.href = "?command=addCollection&collectionID=" + $id;
    }*/

   /* function search(){
        var searchText = document.getElementById("searchText");
        var text = searchText.value;
        text = text.toLowerCase();

        if(text != "entertainment" && text != "fitness" && text != "outdoor"){
            searchText.classList.add("is-invalid");
            document.getElementById("message").innerHTML = "Please enter categories. i.e. Fitness, Outdoor, Entertainment";
        }else{
            searchText.classList.remove("is-invalid");
        }

    }*/


</script>

<script>
    var response;
   /* function searchAjax(){
        var searchText = $("input#searchText").val();
        //document.getElementById("test").innerHTML  = searchText;
        var ajax = new XMLHttpRequest();
        // open the request
        ajax.open("GET", "searchResult.php?searchText="+searchText,true);
        // ask for a specific response
        ajax.responseType = "json";
        // send the request
        ajax.send();

        // What happens if the load succeeds
        ajax.addEventListener("load", function() {
            // set question
            if (this.status == 200) { // worked
                response = this.response;
                document.getElementById("test").innerHTML = response;
            }
        });


        // What happens on error
        ajax.addEventListener("error", function() {
            document.getElementById("test").innerHTML =
                "<div class='alert alert-danger'>An Error Occurred</div>";
        });
    }*/

    /* $(document).ready(function(){
         $("button#search").click(function(){
             var searchText = $("input#searchText").val();
             document.getElementById("test").innerHTML  = searchText;


             var ajax = new XMLHttpRequest();
             // open the request
             ajax.open("GET", "searchResult.php?searchText="+searchText,true);
             // ask for a specific response
             ajax.responseType = "json";
             // send the request
             ajax.send();

             // What happens if the load succeeds
             ajax.addEventListener("load", function() {
                 // set question
                 if (this.status == 200) { // worked
                     response = this.response;
                     document.getElementById("test").innerHTML = response;
                 }
             });

             print();
             // What happens on error
             ajax.addEventListener("error", function() {
                 document.getElementById("test").innerHTML =
                     "<div class='alert alert-danger'>An Error Occurred</div>";
             });
         });
     });*/
</script>
</body>
</html>