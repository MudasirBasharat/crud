<?php
header("Content-Type: application/json");

require_once 'model/product.php';

// Assuming you receive the data from Postman as JSON
$data = json_decode(file_get_contents("php://input"), true);

// Assuming you send the request method via Postman header

$productModel = new Product();

if($_SERVER['REQUEST_METHOD']==='POST') {
        // Create product
        $name = $_REQUEST['name'];
        // $name = $_POST['name'];
        $price = $_REQUEST['price'];
        $description = $_REQUEST['description'];
        // $name = "ali";
        // $price = "50";
        // $description = "asdf";
        $result = $productModel->createProduct($name, $price, $description);
        if ($result === true) {
            echo json_encode(array("message" => "Product created successfully"));
        } else {
            echo json_encode(array("message" => "Failed to create product"));
        }
    }
    elseif ($_SERVER['REQUEST_METHOD']=== 'GET') {
        // Get all products
        $products = $productModel->getProducts();
        // var_dump($products);
        echo json_encode($products);
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Update product
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $price = $_REQUEST['price'];
        $description = $_REQUEST['description'];
        $result = $productModel->updateProduct($id, $name, $price, $description);
        if ($result === true) {
            echo json_encode(array("message" => "Product updated successfully"));
        } else {
            echo json_encode(array("message" => "Failed to update product"));
        }
    }

    elseif ($_SERVER['REQUEST_METHOD']=== 'DELETE') {
        // Delete product
        $id = $data['id'];
        $result = $productModel->deleteProduct($id);
        if ($result === true) {
            echo json_encode(array("message" => "Product deleted successfully"));
        } else {
            echo json_encode(array("message" => "Failed to delete product"));
        }
    }

?>
