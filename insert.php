<?php 
require "config.php";
if(! $conn){
    die('no connect');
}else{
    echo '';
}

if(isset($_POST['save'])){
    $m_name = $_POST['e_name'];
    $m_address = $_POST['e_adress'];
    $m_salary = $_POST['e_salary'];
    $sql = "INSERT INTO crud
    (m_name,m_address,m_salary)
     VALUES ('$m_name', '$m_address',$m_salary)";
     $retval = mysqli_query($conn, $sql);
     if(!$retval){
        die('lỗi rồi');
    }else{
        header('location:index.php');
    }
    }
 
?>