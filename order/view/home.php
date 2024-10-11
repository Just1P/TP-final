<?php require_once('./order/view/partials/header.php'); ?>
<? 
$orderRepository = new OrderRepository(); 
$order = $orderRepository->find();
?>

<main>
		<form method="POST" action="http://localhost:8888/esd-oop-php/create-order">

			<label for="customerName">Nom du client</label>
			<input type="text" id="customerName" name="customerName" required>
			<br>

			<label for="product">Produit</label>

			<select id="product" name="products[]"">
				<?php foreach ($_SESSION['products'] as $product): ?>
					<?php if ($product->isActive()): ?>
						<option value="<?php echo $product->getTitle(); ?>">
							<?php echo $product->getTitle() . ' - ' . $product->getPrice() . ' €'; ?>
						</option>
					<?php endif; ?>
				<?php endforeach; ?>
    		</select>
			<br>

			<button type="submit">Ajouter</button>
		</form>
	</main>

<?php require_once('./order/view/partials/footer.php'); ?>