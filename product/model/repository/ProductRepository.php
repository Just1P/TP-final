<?php

require_once './product/model/entity/Product.php';

class ProductRepository {

    public function __construct() {
        session_start();
    }

    public function persist(Product $product): Product {
        $_SESSION['products'][] = $product;
        return $product;
    }

    public function findAll(): ?array {
        if (!isset($_SESSION['products'])) {
            return [];
        }
        return $_SESSION['products'] ?? [];
    }
    
}
