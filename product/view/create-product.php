<?php require_once('./order/view/partials/header.php'); ?>

<form action="http://localhost:8888/esd-oop-php/process-create-product" method="POST" class="form">
    <div>
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Description :</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="price">Prix :</label>
        <input type="number" id="price" name="price" step="0.01">
    </div>
    <div>
        <label for="isActive">Actif :</label>
        <input type="checkbox" id="isActive" name="isActive" value="1">
    </div>
    <div>
        <button type="submit">Créer le produit</button>
    </div>
</form>

<?php require_once('./order/view/partials/footer.php'); ?>