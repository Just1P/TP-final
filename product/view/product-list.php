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
                        <h2><?= htmlspecialchars($product->getTitle(), ) ?></h2>
                        <p>Description : <?= htmlspecialchars($product->getDescription(), ) ?></p>
                        <p>Prix : <?= htmlspecialchars(number_format($product->getPrice(), 2), ) ?> €</p>
                        
                        <?php if (!empty($product->getId())): ?>
                            <form action="http://localhost:8888/esd-oop-php/add-to-cart" method="post">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product->getId(), ) ?>">
                                <button type="submit">Ajouter au panier</button>
                            </form>

                            <form method="POST" action="http://localhost:8888/esd-oop-php/delete-product">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product->getId(), ) ?>">
                                <button type="submit">Supprimer</button>
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
