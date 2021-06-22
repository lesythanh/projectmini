<?php

    require('config.php');
      $name_search = $_POST['search'];

      $sql = "SELECT *FROM crud WHERE m_name LIKE '%$name_search%'";
      $result = mysqli_query($conn, $sql);
      if(!$result){
          die('fail');
      }else{
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              echo "Name: ".$row['m_name']."<br>";
              echo "Address: ".$row['m_address']."<br>";
              echo "Salaries: ".$row['m_salary']."<br>";
          }
      }
?>
