<?php require_once('./order/view/partials/header.php'); ?>

<main>
    <?php if (isset($_SESSION['last_order'])): ?>
        <h2>Récapitulatif de votre commande</h2>
        <p><strong>Nom du client :</strong> <?php echo htmlspecialchars($_SESSION['last_order']['customerName']); ?></p>
        <h3>Produits commandés :</h3>
        <ul>
            <?php foreach ($_SESSION['last_order']['products'] as $product): ?>
                <li>
                    <?php echo htmlspecialchars($product->getTitle()); ?> - 
                    <?php echo htmlspecialchars($product->getPrice()); ?> €
                </li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Total :</strong> <?php echo htmlspecialchars($_SESSION['last_order']['totalPrice']); ?> €</p>
    <?php else: ?>
        <p>Aucune commande trouvée.</p>
    <?php endif; ?>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>
