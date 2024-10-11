<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./order/controller/IndexController.php');
require_once('./order/controller/ProcessOrderCreateController.php');
require_once('./order/controller/PayController.php');
require_once('./order/controller/ProcessPaymentController.php');
require_once('./order/controller/ProcessShippingAddressController.php');
require_once('./order/controller/ProcessShippingMethodController.php');
require_once('./order/controller/SetShippingAddressController.php');
require_once('./order/controller/SetShippingMethodController.php');
require_once('./product/controller/CreateProductController.php');
require_once('./product/controller/ProcessCreateProductController.php');
require_once ('./product/controller/ListProductsController.php');
require_once ('./product/controller/AddToCartController.php');

// Récupère l'url actuelle et supprime le chemin de base
// c'est à dire : http://localhost:8888/esd-oop-php/public/
// donc cela ne garde que la fin de l'url

$requestUri = $_SERVER['REQUEST_URI'];
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/esd-oop-php/', '', $uri);
$endUri = trim($endUri, '/');


if($endUri === "") {
    $indexController = new IndexController();
    $indexController->index();
    return;
} 

if($endUri === "create-order") {
    $createOrderController = new CreateOrderController();
    $createOrderController->createOrder();
    return;
}  


if ($endUri === "pay") {
    $payController = new PayController();
    $payController->pay();
    return;
}


if ($endUri === "process-payment") {
    $processPaymentController = new ProcessPaymentController();
    $processPaymentController->processPayment();
    return;
}

if ($endUri === "process-shipping-address") {
    $processShippingaddressController = new ProcessShippingAddressController();
    $processShippingaddressController->processShippingAddress();
    return;
}

if ($endUri === "process-shipping-method") {
    $processShippingShippingMethodController = new ProcessShippingMethodController();
    $processShippingShippingMethodController->processShippingMethod();
    return;
}

if ($endUri === "set-shipping-address") {
    $setShippingaddressController = new SetShippingAddressController();
    $setShippingaddressController->setShippingAddress();
    return;
}

if ($endUri === "set-shipping-method") {
    $setShippingMethodController = new SetShippingMethodController();
    $setShippingMethodController->setShippingMethod();
    return;
}

if ($endUri === "process-create-product") {
    $createProductController = new ProcessCreateProductController();
    $createProductController->processCreateProduct();
    return;
}

if ($endUri === "create-product") {
    $createProductController = new CreateProductController();
    $createProductController->createProduct();
    return;
}

if ($endUri === "product-list") {
    $listProductsController = new ListProductsController();
    $listProductsController->showProductList();
    return;
}

if ($endUri === "add-to-cart") {
    $addToCartController = new AddToCartController();
    $addToCartController->addToCart();
    return;
}