<?php

require_once './product/model/repository/ProductRepository.php';

class DeleteProductController {
    
    public function deleteProduct(): void {
        try {

            if (!isset($_POST['product_id'])) {
                $errorMessage = "Aucun produit n'a été sélectionné pour la suppression.";
                require_once './product/view/product-error.php';
                return;
            }

            $productId = $_POST['product_id'];

            if (!isset($_SESSION['products'][$productId])) {
                $errorMessage = "Le produit n'existe pas ou a déjà été supprimé.";
                require_once './product/view/product-error.php';
                return;
            }

            unset($_SESSION['products'][$productId]);

            require_once './product/view/delete-succes.php';

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './product/view/product-error.php';
        }
    }
}
