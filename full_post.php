<?php
// include files
 // include ('excercise1.php'); 
 include ('./includes/header.php');

 $conn = new mysqli('localhost', 'root', '', 'myBlogPage');
 // if post id has been passed along, prepare to display full post
if(isset($_POST['full_post_id'])){
    $id= intval($_POST['full_post_id']);
    // querry connection to the database
    $conn = new mysqli('localhost', 'root', '', 'myBlogPage');
    $query = 'SELECT * FROM posts where id=' . $id; // connection query
    $results = mysqli_query($conn, $query);  
    if(mysqli_connect_errno()) {
        //connection failed
        echo 'Failed to connect to the database' . mysqli_connect_errno();
    } else {
        if ($results ) {
            //echo '<p class="bg-success container text-white text-center col-sm-4 p-1 mt-5"> Post saved succesfully! </p>';
            $post = mysqli_fetch_all($results, MYSQLI_ASSOC);
            // free results
            mysqli_free_result($results);          
            //mysqli_close($conn);
            } else {
                echo '<br/> Connection ERROR: '. mysqli_error($conn);
            }	
	}	
} else {
    echo "No post ID detected";
}
?>	

	<div class=""> 
        
	     <div class="jumbotron container-fluid mr-1 ml-1 pb-3 pt-3 overflow-auto rounded-lg">
	   <h2 class="display-4"> <?php echo $post[0]["title"] ; ?>  </h2>
	   <p> <?php echo $post[0]['body']; ?> </p>
        <!-- back buton -->
	 <a href="./index.php" <button class=" btn btn-primary btn-sm p-2">  Back home </button>  </a>
	   <p class="p-1 mb-0 mt-3 mr-3 float-right"> <small> <span> Author: <i> <?php echo $post[0]['authour']; ?> </i> </span> &nbsp; &nbsp;  &nbsp; &nbsp;
	  <span>  Date: <i> <?php echo $post[0]['time_created']; ?> </i> <span> </small>  </p>
	  
	    </div>

	</div>
   

	<?php
	// include footer file
 	include ('./includes/footer.php'); 

	?>	

