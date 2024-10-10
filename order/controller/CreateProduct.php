<?php

require_once './product/model/entity/Products.php';
require_once './product/model/repository/ProductRepository.php';

class CreateProductController {

    public function createProduct() {
        try {
            if (!isset($_POST['title'])) {
                $errorMessage = "Veuillez indiquer le titre du produit";
                
                require_once './product/view/product-error.php';
                return;
            }

            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = isset($_POST['price']) ? floatval($_POST['price']) : null;
            $isActive = isset($_POST['isActive']) && $_POST['isActive'] === '1';

            $product = new Products($title, $description, $price, $isActive);

            $productRepository = new ProductRepository();
            $productRepository->persist($product);

            require_once './product/view/product-created.php';

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './product/view/product-error.php';
        }
    }
}
