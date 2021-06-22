<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: login.php');
        die();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <table class="table table-bordered"><br><br>
    <button type="button" class="btn btn-primary" onclick="window.open('add.php', '_SELF')">Thêm mới</button><br><br>
    <?php 
            if(isset($_SESSION["login"])){
                echo "xin chào:" . " " .strtoupper($_SESSION["login"][1]);
            }
        ?>
        <a href="logout.php">Logout</a>
    <div align="center">
            <form>
                Search: <input type="text" id="search" />
            </form>
        </div>
            <thead>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Address</th>
                <th scope="col" class="text-center">Salary</th>
                <th colspan="2" class="text-center">Xử lý</th>
            </thead>
            <tbody>
            
            <?php require "config.php";
            $i = 1;
            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)): ?>
            <tr>
                <td><?php echo $i ?> </td>
                <td><?php echo $row['m_name']?></td>
                <td><?php echo $row['m_address']?></td>
                <td><?php echo $row['m_salary']?></td>
                <td><a href="edit.php?id=<?php echo $row['m_id'] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $row['m_id'] ?>">Delete</a></td>
            </tr>
            <?php $i++; endwhile;?>
        </tbody>
            
    </table>
</div>    
</body>
</html>
<script>
$("#search").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            let id = $row.find("td:nth-child(2)").text();

            if (id.indexOf(value) === 0) {
                $row.show();
            }else{
                $row.hide();
            }
        }
    });
});
</script>