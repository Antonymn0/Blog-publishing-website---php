<?php
// include files
 include ('excercise1.php'); 
 include ('./includes/header.php');

?>	

	<div class=""> 
       <h1 class="container">Blog posts </h1> 
	   <p> <?php echo $notification ?> </p>
	  
	   <?php foreach($posts as $post) : ?> 
	     <div class="jumbotron mr-5 ml-5 pb-1 pt-3 overflow-auto rounded-lg">
		 <!-- delete button -->
         <form  method='POST' action='delete_post.php' class="float-right">
			<input type="hidden" name="delete_id" value="<?php echo $post['id'] ?> ">
			<input type="submit" class="btn btn-sm btn-danger" name="submit" value="Delete">
		  </form>
		<!-- edit button -->
		  <form  method='POST' action='update_post.php' class="float-right mr-2 ">
			<input type="hidden" name="update_id" value="<?php echo $post['id'] ?> ">
			<input type="submit" class="btn btn-sm btn-primary" name="submit" value="Edit">
		  </form>
	   <h3 class><?php echo $post['title'] ; ?> </h3>
	   <p> <?php echo $post['intro']; ?> </p>
        <!-- read more buton -->
	   <form  method='POST' action='full_post.php' class="float-left">
			<input type="hidden" name="full_post_id" value="<?php echo $post['id'] ?> ">
			<input type="submit"  class="btn btn-primary" name="submit" value="Read more...">
		</form>
	  

	   <p class="p-1 mb-0 mt-3 mr-5 float-right"> <small> <span> Author: <i> <?php echo $post['authour']; ?> </i> </span> &nbsp; &nbsp;  &nbsp; &nbsp;
	  <span>  Date: <i> <?php echo $post['time_created']; ?> </i> <span> </small>  </p>
	  
	    </div>
<?php endforeach; ?>
		
	</div>
   

	<?php
	// include footer file
 	include ('./includes/footer.php'); 

	?>	

