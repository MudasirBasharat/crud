<?php
require_once 'index.php';
require_once 'config/database.php';
class Product extends Database {
    // Creat

    public function createProduct($name, $price, $description) {
        $sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$description')";
        return $this->conn->query($sql);
    }

    // Read
    public function getProducts() {
        $sql = "SELECT id,name,price,description FROM products";
        // echo "i am here in get products";
        // $result = $this->conn->query($sql);
        return $this->conn->query($sql);
    }

    // Update
    public function updateProduct($id, $name, $price, $description) {
        $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";
        return $this->conn->query($sql);
    }

    // Delete
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id=$id";
        return $this->conn->query($sql);
    }
}
?>
