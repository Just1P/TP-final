<?php

require_once './product/model/entity/Products.php';

class ProductRepository {

    public function __construct() {
        session_start();
    }

    public function persist(Products $product): Products {
        $_SESSION['product'] = $product;
        return $product;
    }

    public function find(): ?Products {
        if (!isset($_SESSION['product'])) {
            return null;
        }
        return $_SESSION['product'];
    }
}
