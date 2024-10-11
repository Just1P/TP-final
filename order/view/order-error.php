<?php require_once('./order/view/partials/header.php'); ?>
	
	<main>
		<div class="message error">
			Il y a eu une erreur : <?php echo htmlspecialchars($errorMessage); ?>
		</div>	
	</main>

<?php require_once('./order/view/partials/footer.php'); ?>