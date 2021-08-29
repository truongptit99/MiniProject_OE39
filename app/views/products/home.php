<?php 
  if(!isset($_SESSION['username']) && !isset($_COOKIE['username'])){
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include_once("../public/assets/css/products/home.css")?>
    </style>
    <?php include_once("../app/views/inc/navbar.php")?>
</head>

<body>
    <div class="wrap" id="product-wrap">
        <a href="/products/showAddForm" class="btn btn-primary" id="product__btn-add">
            <i class="fa fa-plus"></i>
            Add new product
        </a>
        <form action="" class="product__form-search">
            <input type="text" class="form-control" placeholder="Enter name product">
            <button type="submit" class="btn btn-primary btn-search">
                <i class="fa fa-search"></i>
            </button>
        </form>
        <h3>List Products</h3>
        <table class="table table-bordered table-hover product__table-list table-list">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Description</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($products)){
                        $i = 0;
                        foreach($products as $row){
                            $i+=1;
                ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $i; ?></th>
                    <td><img src="<?php echo '../assets/images/'.$row['image']?>" alt="" style="width: 50px; height: 50px; display: block; margin: auto;"></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['des']?></td>
                    <td><?php echo $row['price']?></td>
                    <td class="text-center">
                        <a href="/products/showEditForm/<?php echo $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                        <a href="/products/delete/<?php echo $row['id'] ?>"><i class="fa fa-trash" style="color: red"></i></a>
                    </td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>