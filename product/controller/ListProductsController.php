<?php

require_once './product/model/repository/ProductRepository.php';

class ListProductsController
{
    public function showProductList()
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->findActiveProducts();

        require_once './product/view/product-list.php';
    }
}
