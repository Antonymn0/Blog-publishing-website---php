<?php
// import file includes
include ('./includes/header.php');

// build connection to the database
$conn = new mysqli('localhost', 'root', '', 'myBlogPage');
$query = 'SELECT * FROM posts'; // connection query
$results = mysqli_query($conn, $query);

if(isset($_POST['title']) && isset($_POST['body']) && isset($_POST['author'])) {
    //build insert query
    
$insert_query = "INSERT INTO posts(title, body, authour, intro) VALUES ('{$_POST['title']}', '{$_POST['body']}','{$_POST['author']}', '{$_POST['intro']}' )";
     
if(mysqli_connect_errno()) {
	//connection failed
	echo 'Failed to connect to the database' . mysqli_connect_errno();
} else {
	if (mysqli_query($conn, $insert_query)) {
        echo '<p class="bg-success container text-white text-center col-sm-4 p-1 mt-5"> Post saved succesfully! </p>';
        
        mysqli_close($conn);
		 } else {
			 echo '<br/> Connection ERROR: '. mysqli_error($conn);
		 }	
	}	
}
	?>

<div>  

    <form method="POST" target="add_new_post.php" class=" m-5"> 
    <a href="./index.php" class="btn btn-primary float-right rounded-left"> Back home </a>
    <fieldset>
        <legend>Add new post</legend>
    
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name='title' id="title" aria-describedby="emailHelp" placeholder="Post title" required>
        
        </div>
        <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" name='author' placeholder="author" required>
        </div>
        <div class="form-group">
        <label for="intro">Intro</label>
        <input type="text" class="form-control" id="intro" name='intro' placeholder="Preview" required>
        </div>
        <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" rows="3" name='body'   > </textarea>
        </div>
        <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Please select files to upload. eg, images.  </small>
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
    </form>

</div>



<?php
	// include footer file
 	include ('./includes/footer.php'); 

	?>

