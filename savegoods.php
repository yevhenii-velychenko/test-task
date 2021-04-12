<?php
require_once('db.php');

/////////////////////////////
// checking goods in POST variable and save to database

if(isset($_POST["submit"]))
{
  $product_name = htmlspecialchars($_POST["product_name"]);
  $picture_url = htmlspecialchars($_POST["picture_url"]);
  $price = htmlspecialchars($_POST["price"]);
  $user_name = htmlspecialchars($_POST["user_name"]);


  $sql = "INSERT INTO shop.goods (product_name, picture_url, price, user_name) VALUES ( '" . $product_name . "','" . $picture_url . "'," . $price . ",'" . $user_name . "')";
  $result_adding_to_database = $conn->query($sql);
  if(!$result_adding_to_database){
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $_POST = array(); // clear POST
}

require_once('header.php')
?>
<br>
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-8">
        <?php
        global $result_adding_to_database;
        if($result_adding_to_database){
          echo "<div class=\"alert alert-secondary\" role=\"alert\">";
          echo "Товар добавлено!";
          echo "</div>";
        }
        else{
          echo "<div class=\"alert alert-danger\" role=\"alert\">";
          echo "Ошибка при добавлении товара.<br><br>";
          //echo "Error: " . $sql . "<br>" . $conn->connect_error;
          echo "</div>";
        }
        ?>
      <center><a href="addgoods.php">Назад</a> </center>
    </div>
  </div>
</div>
