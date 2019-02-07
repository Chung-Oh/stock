<div class="row msg-home">
	<div class="col-12 title-top">
		<?php showAlert('success'); showAlert('danger') ?>
		<h2>Bem-vindo ao StockSystem.</h2>
		<?php if ($categorys) : ?>
			<p>Segue abaixo, como está o sistema no momento</p>
		<?php else : ?>
			<p>Selecione uma das opções do Menu para começar a usar o Sistema.</p>
		<?php endif ?>
	</div>
</div>