<?php

require_once './order/model/entity/Order.php';
require_once './order/model/repository/OrderRepository.php';

class CreateOrderController {

    public function createOrder() {
        session_start();

        try {
            if (!isset($_POST['customerName']) || !isset($_POST['products'])) {
                $errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
                require_once './order/view/order-error.php';
                return;
            }

            $customerName = $_POST['customerName'];
            $selectedProducts = $_POST['products'];

            $products = [];


            foreach ($selectedProducts as $productTitle) {
                foreach ($_SESSION['products'] as $product) {
                    if ($product->getTitle() === $productTitle && $product->isActive()) {
                        $products[] = $product;
                        break; 
                    }
                }
            }

            $order = new Order($customerName, $products);

            $orderRepository = new OrderRepository();
            $orderRepository->persist($order);

            $_SESSION['last_order'] = [
                'customerName' => $order->getCustomerName(),
                'products' => $order->getProducts(),
                'totalPrice' => $order->getTotalPrice(),
            ];

            // Redirection vers la page de récapitulatif après paiement
            exit;

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once './order/view/order-error.php';
        }
    }
}
