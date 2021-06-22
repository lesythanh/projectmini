<?php 
require "config.php";
if(! $conn){
    die('no connect');
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM  crud WHERE m_id = $id";
    $retval = mysqli_query($conn, $sql);
    if(!$retval){
        die('lỗi rồi');
    }else{
        header('location:index.php');
    }
}
?>