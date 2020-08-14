<?php
// include files
 include ('excercise1.php'); 
 include ('./includes/header.php');
 

 if(isset($_POST['delete_id'])) {
	 $id =  intval($_POST['delete_id']);
	 
	 // build delete command string
 $del_query = "DELETE  FROM posts WHERE id = '{$id}'" ;
			if (!mysqli_query($conn, $del_query)) {
				echo 'ERROR: '.mysqli_error($conn);
			 }else{
                echo '<p class="bg-success container text-white text-center col-sm-4 p-1 mt-5"> Post deleted succesfully...! </p>';
			header("Location: index.php");
		    mysqli_close($conn);   // close connection
			}
 		}else {
			 echo 'ID parameter not set';
		 }
		
    ?>

	
<?php
	// include footer file
 	include ('./includes/footer.php'); 

	?>