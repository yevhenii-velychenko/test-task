<?php require_once('header.php') ?>
<br><br>
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8 col-xl-6">
      <form action="savegoods.php" method="post">
        <center><h3>Добавить товар</h3></center>
        <br>
        <div class="mb-3">
          <label for="productName1" class="form-label">Название товара</label>
          <input type="text" class="form-control" name="product_name" id="productName1" required>
        </div>
        <div class="mb-3">
          <label for="productPicture1" class="form-label">Изображение (URL)</label>
          <input type="url" class="form-control" name="picture_url" id="productPicture1" required>
        </div>
        <div class="mb-3">
          <label for="productName1" class="form-label">Средняя цена</label>
          <input type="text" class="form-control" name="price" id="productName1" required>
        </div>
        <div class="mb-3">
          <label for="productName1" class="form-label">Имя добавившего товар</label>
          <input type="text" class="form-control" name="user_name" id="productName1" required>
        </div>
        <input type="submit" name="submit" value="Добавить" class="btn btn-success"></input>
      </form>
    </div>
    </div>
  </div>
