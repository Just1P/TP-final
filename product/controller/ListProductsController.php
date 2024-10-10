<?php

require_once './product/model/repository/ProductRepository.php';

class ListProductsController
{
    public function showProductList()
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->findAll();

        $activeProducts = array_filter($products, function($product) {
            return $product->isActive();
        });

        require_once './product/view/product-list.php';
    }
}
