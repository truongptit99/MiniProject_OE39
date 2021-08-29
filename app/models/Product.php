<?php 

require_once("../public/connection.php");

class Product{
    private $conn; 
    protected $id;
    protected $image;
    protected $name;
    protected $des;
    protected $price;

    public function __construct()
    {
        $this->conn = DB::connect();
    }

    public function getAllProducts(){
        $sql = "select * from products";
        $result = $this->conn->query($sql);

        $products = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($products, $row);
        }
        $_SESSION['listPrd'] = $products;
        return $products;
    }

    public function insertProduct($file, $name, $des, $price){
        $output_dir = "/opt/lampp/htdocs/Mini_Project/public/assets/images";

        $imgName = str_replace(" ", "-", strtolower($file['name'][0]));

        if(!file_exists($output_dir."/".$imgName)){
            move_uploaded_file($file['tmp_name'][0], $output_dir."/".$imgName);
        }

        $sql = "insert into products (image, name, des, price) values('$imgName', '$name', '$des', $price)";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function updateProduct($id, $file, $fileLabel, $name, $des, $price){
        if($file['name'][0] != ""){
            $output_dir = "/opt/lampp/htdocs/Mini_Project/public/assets/images";

            $imgName = str_replace(" ", "-", strtolower($file['name'][0]));

            if(!file_exists($output_dir."/".$imgName)){
                move_uploaded_file($file['tmp_name'][0], $output_dir."/".$imgName);
            }
        }else $imgName = $fileLabel;
        $sql = "update products set image = '$imgName', name = '$name', des = '$des', price = $price where id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function deleteProduct($id){
        $sql = "delete from products where id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>