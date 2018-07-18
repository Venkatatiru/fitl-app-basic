<?php
$id = $_REQUEST['id'];

/*$title = '';
$question = '';
$description = '';
$code = '';
$date = '';*/

$object = array(
      'title' => '',
      'question' => '',
      'description' => '',
       'code' => '',
       'date' => '');


// Database connection credentials.
$servername = 'localhost';
$username = 'homestead';
$password = 'secret';

$connection = new mysqli($servername,$username,$password);

//check for an error
if ($connection->connect_error) {
  echo 'Connection Failed'.$connection->connect_error;
  exit;
}

echo 'Connected Successfully'; 

//Connect to fitl database.
$connection->select_db('fitl');

$sql = 'select * from questions where id = '.$id;

$result = $connection->query($sql);

// Check and retrieve the content of the object
if ($result->num_rows > 0) {
  $object = $result->fetch_assoc();
  //echo '<pre>';
  //print_r($object);
  //echo '</pre>';
}

?>


<!DOCTYPE html>
<html>
    <head>
    	<title>
    		<?php echo $object['title']; ?>
    	</title>
    </head>
    <body>
    	<h1><?php echo $object['title']; ?></h1> 
    	<p><?php echo $object['description']; ?></p>
    	  <pre>
    	  	 <?php echo $object['code']; ?>
    	  </pre>
    	  <p>Question Date: <?php echo $object['submitted_at']; ?></p>
    </body>
</html>