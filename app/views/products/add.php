<?php
if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
  header("Location: http://www.truongcr.com");
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <style>
    <?php include_once("../public/assets/css/products/add.css"); ?>
  </style>
  <?php include_once("../app/views/inc/navbar.php"); ?>
</head>

<body>
  <form action="/products/add" class="product-edit" method="post" enctype="multipart/form-data">
    <label for="">Name:</label>
    <input type="text" id="" class="form-control" name="name" required>
    <br>
    <label for="">Description:</label>
    <textarea rows="3" id="" class="form-control" name="des"></textarea>
    <br>
    <label for="">Price:</label>
    <input type="number" id="" class="form-control" name="price" required>
    <br>
    <label for="">Image:</label>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="customFile" name="image[]" required>
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    <button type="submit" class="btn btn-primary btn-submit">Save</button>
  </form>
  <script>
    $('#customFile').on('change', function() {
      var fileName = $(this).val();
      $(this).next('.custom-file-label').html(fileName);
    });
  </script>
</body>

</html>