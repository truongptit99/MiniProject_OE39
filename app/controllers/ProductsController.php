<?php 
require_once("../app/controllers/BaseController.php");
require_once("../app/models/Product.php");

class ProductsController extends BaseController{
    public function home(){
        $product = new Product();
        $products = $product->getAllProducts();
        $data = ["products" => $products];
        $this->view("products/home", $data);
    }

    public function showAddForm(){
        $this->view("products/add");
    }

    public function add(){
        $file = $_FILES['image'];
        $name = $_POST['name'];
        $des = $_POST['des'];
        $price = $_POST['price'];

        $product = new Product();

        $result = $product->insertProduct($file, $name, $des, $price);
        if($result){
            header("Location: http://www.truongcr.com/products/home");
        }
    }

    public function showEditForm($id){
        $products = $_SESSION['listPrd'];
        foreach($products as $item){
            if($item['id'] == $id){
                $data = ['id' => $item['id'], 'image' => $item['image'], 'name' => $item['name'], 'des' => $item['des'], 'price' => $item['price']];
                $this->view("products/edit", $data);
            }
        }
    }

    public function edit(){
        $id = $_POST['id'];
        $file = $_FILES['image'];       
        $name = $_POST['name'];
        $des = $_POST['des'];
        $price = $_POST['price'];

        $fileLabel = $_POST['imgLabel'];

        $product = new Product();

        $result = $product->updateProduct($id, $file, $fileLabel, $name, $des, $price);

        if($result){
            header("Location: http://www.truongcr.com/products/home");
        }
    }

    public function delete($id){
        $product = new Product();
        $result = $product->deleteProduct($id);
        if($result){
            header("Location: http://www.truongcr.com/products/home");
        }
    }
}

?>