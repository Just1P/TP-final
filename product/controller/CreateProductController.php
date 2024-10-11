<?php

require_once './product/model/repository/ProductRepository.php';

class CreateProductController
{
    public function createProduct(): void 
    {
        require_once './product/view/create-product.php';
    }
}
