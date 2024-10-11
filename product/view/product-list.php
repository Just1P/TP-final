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
                        
                        <!-- Vérifier si le produit a bien un ID avant d'afficher le bouton -->
                        <?php if (!empty($product->getId())): ?>
                            <form action="http://localhost:8888/esd-oop-php/add-to-cart" method="post">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product->getId(), ENT_QUOTES) ?>">
                                <button type="submit">Ajouter au panier</button>
                            </form>

                        <?php else: ?>
                            <p>Impossible d'ajouter ce produit au panier.</p>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>

<?php require_once('./order/view/partials/footer.php'); ?>
