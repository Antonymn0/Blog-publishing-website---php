<?php
// include files
 include ('excercise1.php'); 
 include ('./includes/header.php');

$search_query = '';
$search_results = [];
if(isset($_POST['search_field']) == true) {
    $search_query = strtolower(htmlentities($_POST['search_field']) );
    foreach($posts as $post){
        $post_title = strtolower($post['title']);
        if(strpos($post_title, $search_query) == true ) {
        $search_results[] = $post;
    }
}
 if(!$search_results) {  echo "No match found for your search...!"; }
} else {
   echo "No search term provided";
}

$search_query = '';

?>


<!-- begin html --> 
<div>  
 <h1> Search results </h1>
  <?php foreach($search_results as $search_result) : ?>
  <!-- display each entry in a jumbotron --> 
  <div class=" container jumbotron "> 
    <h4> <?php echo $search_result['title'] ; ?> </h4>
    <p> <?php echo $search_result['intro'] ; ?> </p>
    <!-- read more buton -->
    <form  method='POST' action='full_post.php' class="float-left">
			<input type="hidden" name="full_post_id" value="<?php echo $search_result['id']; ?> ">
			<input type="submit"  class="btn btn-primary btn-sm" name="submit" value="Read full post">
		</form>
            <p class="p-1 mb-0 mt-3 mr-5 float-right"> <small> <span> Author: <i> <?php echo $search_result['authour']; ?> </i> </span> &nbsp; &nbsp;  &nbsp; &nbsp;
	  <span>  Date: <i> <?php echo $search_result['time_created']; ?> </i> <span> </small>  </p>
	  
        
        
        
        



</div>

<?php endforeach; ?>




</div>