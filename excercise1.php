<?php
	$server = [
		"Server name" => $_SERVER['SERVER_NAME'],
		"Server Header" => $_SERVER["HTTP_HOST"],
		"Server Software" => $_SERVER['SERVER_SOFTWARE'],
		"Document Root" => $_SERVER['DOCUMENT_ROOT'],
		"Current Page" => $_SERVER['PHP_SELF'],
		"Script Name"  => $_SERVER['SCRIPT_NAME']
	];
	$client =[
		"Client System Info" => $_SERVER['HTTP_USER_AGENT'],
		"Client IP address" => $_SERVER['REMOTE_ADDR'],
		"Remote Port" => $_SERVER['REMOTE_PORT']
	];

    /*
	foreach($server as $key => $value) {
		echo $key.': '. $value .'<br>';
	}
	echo '<br>';echo '<br>';
	foreach($client as $key => $value) {
		echo $key.': '. $value .'<br>';
	}
	*/


// build connection to the database
$conn = new mysqli('localhost', 'root', '', 'myBlogPage');
$query = 'SELECT * FROM posts'; // connection query
$results = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($results, MYSQLI_ASSOC); //fetch data
$notification='';
// free results
mysqli_free_result($results);

if(mysqli_connect_errno()) {
	//connection failed
	echo 'Failed to connect to the database' . mysqli_connect_errno();
} 	
if(!$posts){
	$notification = "<p class='container bg-info text-white p-3 mt-3 col-md-6'> No posts to show. Please go to <a  href='./add_new_post.php' class= 'text-dark'> add posts</a> to create a new post. </p> ";
}

	?>