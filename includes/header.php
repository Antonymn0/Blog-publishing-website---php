<?php
// include files
include('searchSuggestions.php');


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">
	 <!--   ## links to CDN commented out during local development   -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--  ## links below are to local files used during development   -->
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="font_awesome/css/all.css">
        <link rel="stylesheet" href="css/master.css">

        <script>
        // Show suggestions function with AJAX request 
        function showSuggestions(str){
          if(str.length !== 0 && str.length > 3) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function ()  {
              if(this.readyState == 4 && this.status == 200) {
                console.log("responce = "+this.responceText);
                document.getElementById('suggestions').innerHTML = this.responceText
                 } 
             }
            xhttp.open("GET", "./includes/searchSuggestions.php?q="+str, true);
            xhttp.send();
              }
         }
        
        // select search term from the displayed suggestions
        function selectSuggestion (val) {
          document.getElementById('searchField').value =   val;
        }
        
        
         </script>
   <title>Home page</title>
  </head>
  <body> 
  <!-- header and page navigation links -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand pr-5 " href="./index.php"> <h2> Techblog.net </h2> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./add_new_post.php">Add post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action='search_results.php'>
      <input class="form-control mr-sm-2" type="text" id='searchField' name='search_field'  placeholder="Search here..." onkeyup="showSuggestions(this.value)">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit" name='submit'  >Search</button>
    </form>

  </div>
</nav>
 <ul class="text-center list-unstyled" >
 <b>Suggestions: </b>  
 <li id="suggestions">  </li>

 </ul>

