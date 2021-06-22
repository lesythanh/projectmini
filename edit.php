<?php 
require "config.php";
if(!empty($_POST)){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if(isset($_POST['e_name'])){
        $name = $_POST['e_name'];
    }
    if(isset($_POST['e_adress'])){
        $address = $_POST['e_adress'];
    }
    if(isset($_POST['e_salary'])){
        $salary = $_POST['e_salary'];
    }
    $sql = "UPDATE crud set  m_name='$name', m_address='$address', m_salary=$salary WHERE m_id ='$id'";
    $retval = mysqli_query($conn, $sql);
    if(! $retval){
        echo "lỗi rồi";
    }else{
        header('location:index.php');
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if($id != ''){
        $sql = "SELECT * FROM crud WHERE m_id = $id";
        $retval = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        if($data != null){
            $name = $data['m_name'];
            $address = $data['m_address'];
            $salary = $data['m_salary'];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List name</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
   <form action="" method="POST">
        <div class="form-group">
            <input type="text" name="id" value="<?= $id?>" hidden="true">
            <label for="exampleInputEmail1"> Name</label>
            <input type="text" name="e_name" value="<?=$name?>" class="form-control"  placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Adress</label>
            <input type="text" name="e_adress" value="<?=$address?>" class="form-control"  placeholder="adress">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Salary</label>
            <input type="text" name="e_salary" value="<?=$salary?>" class="form-control"  placeholder="salary">
        </div>
      <button type="submit" name="save" class="btn btn-primary">Save</button>
</form>
</div>    
</body>
</html>