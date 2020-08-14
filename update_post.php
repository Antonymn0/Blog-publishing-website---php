<?php
// import file includes
 include ('./includes/header.php');

 $conn = new mysqli('localhost', 'root', '', 'myBlogPage');
 // if post id has been passed along, prepare to display full post
if(isset($_POST['update_id'])){
    $id= intval($_POST['update_id']);
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

if(isset($_POST['submit'])){
    if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['body']) && isset($_POST['update_id']) ) {
       // begin SQL update process
       $update_id = intval($_POST['update_id']) ;
       $update_query = "UPDATE posts 
                        SET title = '{$_POST['title']}',
                            authour = ' {$_POST['author']}', 
                            body = '{$_POST['body']}', 
                            intro = '{$_POST['intro']}'
                        WHERE  id = {$update_id} ";
        //die($update_query);
        If(mysqli_query($conn, $update_query)){ 
            echo "<p class='bg-success text-white container text-center col-md-4 mt-3 p-1'> Post updated successfuly...! </p>";
        } else {
            //handle connection error
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

}
	?>

<div> 
    <form method="POST" target="<?php $_SERVER['PHP_SELF']?>" class=" m-5"> 
    <a href="./index.php" class="btn btn-primary float-right rounded-left"> Back home </a>
    <fieldset>
        <legend>Edit/update post</legend>
        
        <div class="form-group">
        <label for="title">Title</label>
    <input type="text" class="form-control" name='title' id="title"  value='<?php echo $post[0]["title"] ; ?> ' required>
        
        </div>
        <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" name='author' value= '<?php echo $post[0]['authour']; ?>' required>
        </div>
        <div class="form-group">
        <label for="intro">Intro</label>
        <input type="text" class="form-control" id="intro" name='intro' placeholder="preview" value="<?php echo $post[0]['intro']; ?>" required>
        </div>
        <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" rows="5" name='body'  > <?php echo $post[0]['body']; ?>  </textarea>
        </div>
        <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Please select files to upload. eg, images.  </small>
        </div>
        <input type="hidden" name="update_id" value="<?php echo $id ?> ">
        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    </fieldset>
    </form>

</div>



<?php
	// include footer file
 	include ('./includes/footer.php'); 

	?>