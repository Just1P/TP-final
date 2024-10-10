<?php require_once('./order/view/partials/header.php'); ?>

<main>
    <h1>Liste des Produits</h1>

    <?php if (empty($products)): ?>
        <p>Aucun produit n'a été ajouté pour le moment.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <?php if ($product->isActive()): ?>
                    <li>
                        <h2><?= htmlspecialchars($product->getTitle(), ENT_QUOTES) ?></h2>
                        <p>Description : <?= htmlspecialchars($product->getDescription(), ENT_QUOTES) ?></p>
                        <p>Prix : <?= htmlspecialchars(number_format($product->getPrice(), 2), ENT_QUOTES) ?> €</p>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>
