<?php
  require_once('header.php');
  require_once('db.php');
?>
<br><br>
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Название товара</th>
            <th>Изображение</th>
            <th>Дата добавления</th>
            <th>Имя добавившего товар</th>
            <th>Количество отзывов</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM shop.goods";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $result2 = $conn->query('SELECT count(*) FROM shop.reviews WHERE good_id = ' . $row["id"]);
                $review_count = $result2->fetch_assoc();
                echo "<tr>
                  <td><a href=\"product.php?id=". $row["id"] ."\">" . $row["product_name"] . "</a></td>
                  <td><img src=\"" . $row["picture_url"] . "\" alt=\"picture\" width=\"100\"></td>
                  <td>".$row["created_at"]."</td>
                  <td>".$row["user_name"]."</td>
                  <td>". $review_count["count(*)"] ."</td>
                </tr>";
              };
            } else {
              echo "<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>";
            }
            $conn->close();
          ?>
        </tbody>
      </table>
    </div>
<?php require_once('footer.php') ?>
