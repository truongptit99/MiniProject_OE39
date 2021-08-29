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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    <?php include_once("../public/assets/css/products/add.css"); ?>
  </style>
  <?php include_once("../app/views/inc/navbar.php"); ?>
</head>

<body>
  <form action="/products/edit" class="product-edit" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" <?php if (isset($id)) { ?> value="<?php echo $id;
                                                                  } ?>" required>
    <label for="">Name:</label>
    <input type="text" id="" class="form-control" name="name" <?php if (isset($name)) { ?> value="<?php echo $name;
                                                                                              } ?>" required>
    <br>
    <label for="">Description:</label>
    <textarea rows="3" id="" class="form-control" name="des"><?php if (isset($des)) {
                                                                echo $des;
                                                              } ?></textarea>
    <br>
    <label for="">Price:</label>
    <input type="number" id="" class="form-control" name="price" <?php if (isset($price)) { ?> value="<?php echo $price;
                                                                                                  } ?>" required>
    <br>
    <label for="">Image:</label>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="customFile" name="image[]">
      <label class="custom-file-label" for="customFile"><?php if (isset($image)) echo $image; ?></label>
      <input type="hidden" name="imgLabel" <?php if (isset($image)) { ?> value="<?php echo $image;
                                                                            } ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-submit">Save</button>
  </form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $('#customFile').on('change', function() {
      var fileName = $(this).val();
      $(this).next('.custom-file-label').html(fileName);
    });
  </script>
</body>

</html>