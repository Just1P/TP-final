<?php

require_once './product/model/repository/ProductRepository.php';

class CreateProductController
{
    public function createProduct(): void 
    {
        $productRepository = new ProductRepository();
        $product = $productRepository->findAll();

        require_once './product/view/create-product.php';
    }
}
