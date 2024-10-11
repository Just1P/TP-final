<?php require_once('./order/view/partials/header.php'); ?>

<main>
    <h1>Récapitulatif de votre commande</h1>

    <?php

    $cart = $_SESSION['cart'] ?? [];
    $total = 0;
    foreach ($cart as $product) {
        $total += $product->getPrice();
    }

    $order = $_SESSION['order'] ?? null;
    $shippingAddress = $order->getShippingAddress() ;
    $shippingMethod = $order->getShippingMethod() ;
	$shippingAddress = $order->getShippingAddress() ;
    $shippingCity = $order->getShippingCity() ;
    $shippingCountry = $order->getShippingCountry();
    ?>

    <?php if (empty($cart)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <h2>Adresse de livraison :</h2>
        <?= htmlspecialchars($shippingAddress, ENT_QUOTES) ?><br>
            <?= htmlspecialchars($shippingCity, ENT_QUOTES) ?><br>
            <?= htmlspecialchars($shippingCountry, ENT_QUOTES) ?>

        <h2>Méthode de livraison :</h2>
        <p><?= htmlspecialchars($shippingMethod, ENT_QUOTES) ?></p>

        <h2>Produits :</h2>
        <ul>
            <?php foreach ($cart as $product): ?>
                <li>
                    <h2><?= htmlspecialchars($product->getTitle(), ENT_QUOTES) ?></h2>
                    <p>Description : <?= htmlspecialchars($product->getDescription(), ENT_QUOTES) ?></p>
                    <p>Prix : <?= htmlspecialchars(number_format($product->getPrice(), 2), ENT_QUOTES) ?> €</p>
                </li>
            <?php endforeach; ?>
        </ul>

        <p><strong>Total à payer : <?= htmlspecialchars(number_format($total, 2), ENT_QUOTES) ?> €</strong></p>

        <form method="POST" action="http://localhost:8888/esd-oop-php/process-payment">
            <button type="submit">Payer</button>
        </form>
    <?php endif; ?>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>
