<?php

require_once './product/model/entity/Product.php';

class ProductRepository {
    private array $products = [];

    public function __construct() {
        session_start();
        if (isset($_SESSION['products'])) {
            $this->products = $_SESSION['products'];
        }
    }

    public function persist(Product $product): void {
        $this->products[$product->getId()] = $product;
        $_SESSION['products'] = $this->products;
    }

    public function findById(string $id): ?Product {
        return $this->products[$id] ?? null;
    }

    public function findActiveproducts(): array {
        return $this->products;
    }
}
