<?php
require_once('db.php');

/////////////////////////////
// getting product id
if(isset($_GET["id"])){
  $product_id = htmlspecialchars($_GET["id"]);
} else {
  echo "Такого товара не существует";
  die();
}

/////////////////////////////
// checking comments in POST variable and save to database

if(isset($_POST["submit"]))
{
  $good_id = htmlspecialchars($_POST["id"]);
  $comment = htmlspecialchars($_POST["comment"]);
  $rating = htmlspecialchars($_POST["rating"]);
  $user_name = htmlspecialchars($_POST["user_name"]);


  $sql = "INSERT INTO shop.reviews (good_id, user_name, comment, rating) VALUES ( " . $good_id . ",'" . $user_name . "','" . $comment . "'," . $rating . ")";
  if(!$conn->query($sql)){
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $_POST = array(); // clear POST
  header('Location: product.php?id=' . $good_id);
  die;
}


/////////////////////////////
//Getting data from database:

$result = $conn->query('SELECT * FROM shop.goods WHERE id = ' . $product_id);
$product_info = $result->fetch_assoc();

$result2 = $conn->query('SELECT * FROM shop.reviews WHERE good_id = ' . $product_id);

$product_reviews[] = NULL;

if ($result2->num_rows > 0) {
  while($row = $result2->fetch_assoc()) {
    $product_reviews[] = $row;
  }
}

/////////////////////////////
//Calculating average product rating:

$average_rating = 0;
$counter = 0;

foreach ($product_reviews as $product_review) {
  if(isset($product_review["rating"]))
  {
    $average_rating += $product_review["rating"];
    $counter++;
  }
}

if($counter>0)
{
  $average_rating = round($average_rating / $counter);
}

require_once('header.php');
?>

<div class="container">
  <div class="row d-flex justify-content-center">
      <div class="col-lg-9">
        <div class="card mt-4">
          <img src="<?php echo $product_info["picture_url"]; ?>" class="card-img-top img-fluid" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $product_info["product_name"]; ?></h3>
            <h4>₴ <?php echo $product_info["price"]; ?></h4>
            <p class="card-text">Рейтинг: <?php echo $average_rating ?> </p>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Отзывы о товаре
          </div>
          <div class="card-body">
            <?php
            foreach ($product_reviews as $product_review) {
              echo "<p>" . $product_review["comment"] . "</p>";
              if($product_review["user_name"]!=null && $product_review["user_name"]!="")
              {
                echo "<small class=\"text-muted\"> Автор: " . $product_review["user_name"] . " | Дата и время: " . $product_review["created_at"] .  " | Оценка товара: ". $product_review["rating"] . "/10 </small><hr>";
              };
            };
            ?>
          </div>
          </div>
          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Добавить отзыв
            </div>
            <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $product_id; ?>">
                <label for="userName1" class="form-label">Имя:</label>
                <input type="text" name="user_name" class="form-control" id="userName1" placeholder="Твое имя" required>
                 <br>
                 <p>Выбери оценку:</p>
                <?php
                  for ($i=1; $i <= 10 ; $i++) {
                      echo('<div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating" id="inlineCheckbox1" value="'.$i.'" required>
                        <label class="form-check-label" for="inlineCheckbox1">'.$i.'</label>
                      </div>');
                    };
               ?>
               <br><br>
               <label for="comment1" class="form-label">Коментарий:</label>
                <textarea class="form-control" name="comment" id="comment1" rows="3" placeholder="Коментарий о товаре" required></textarea>
                <br>
              <input type="submit" name="submit" value="Оставить отзыв" class="btn btn-success"></input>
            </form>
          </div>
        </div>
        <!-- /.card -->

  </div>
  </div></div>
