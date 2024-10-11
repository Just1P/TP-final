<?php

require_once './product/model/entity/Product.php';
require_once './product/model/repository/ProductRepository.php';

class AddToCartController {

    public function addToCart(): void {
        try {


            $productId = $_POST['product_id'];

            $productRepository = new ProductRepository();
            $product = $productRepository->findById($productId);
            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                require_once './order/view/home.php';
                return;
            }

            if (!isset($_POST['product_id'])) {
                $errorMessage = "Aucun produit n'a été sélectionné.";
                require_once './product/view/cart-error.php';
                return;
            }

            if (!$product) {
                $errorMessage = "Le produit sélectionné n'existe pas.";
                require_once './product/view/cart-error.php';
                return;
            }

            $_SESSION['cart'][$product->getId()] = $product;

            require_once './product/view/cart-succes.php';

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './cart/view/cart-error.php';
        }
    }
}
