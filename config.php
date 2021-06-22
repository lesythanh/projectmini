<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'crud';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn){
    die('not connect database:' . mysqli_erro());
}
$sql = 'SELECT * FROM crud';
$retval = mysqli_query($conn, $sql);

?>