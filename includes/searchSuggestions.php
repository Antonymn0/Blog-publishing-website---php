<?php 

// define initial search terms to be seached through  by the search field
$searches = ["two factor authentication works", "how 2FA works", "keeping your acounts safe"];

  // get search term 
   
 $suggestions = []; //initialize suggestions
 if(isset($_REQUEST['q']) ){ 
  $query = htmlentities($_REQUEST['q']);
     // start sessions to store the search querry in the sessions
  session_start();
  if(isset($_SESSION['search_queries'])) { // if $search_query session arry exists, push arry. Else create new and push query into the session array.
    $_SESSION['search_queries'][] = $query;
     } else { 
      $_SESSION['search_queries'] =[];
      $_SESSION['search_queries'][] = $query;
  }
  
var_dump($_SESSION['search_queries']);

     foreach ($_SESSION['search_queries'] as $searchTerm ) {
      if(strpos($searchTerm, $query) == true) {
         $suggestions[] = $searchTerm;
          }
       }
     foreach($suggestions as $suggestion){ 
       echo ` <li onclick="selectSuggestion(this.value)"> <i> $suggestion </i> <li/>`;      
    } 
 
 }else {
       // echo " query is not set <br/>";
      
    }
  

?>