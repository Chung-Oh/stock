<?php
use Src\Helpers\Convert;
use Src\Helpers\Date;
?>

<!-- Primeira linha -->
<section class="row user-head-one">
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Logado como:</strong><?php echo Convert::afterFirst($user->getName()) ?></p>
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Criado:</strong><?php echo Date::dateFull($user->getCreatedAt()) ?></p>
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Atualizado:</strong><?php echo Date::dateFull($user->getUpdatedAt()) ?></p>
	</div>
</section>
<!-- Segunda linha -->
<section class="row user-head-two">
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Nº acesso:</strong><?php echo count($logList) ?></p>
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Último acesso:</strong><?php echo Date::lastAccess($logList) ?></p>
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Início da sessão:</strong><?php echo Date::initAccess($logList) ?></p>
	</div>
</section>
<!-- Terceira linha -->
<section class="row user-head-three">
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Categorias criadas:</strong><?php echo $categorysCreate ?></p>
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Categorias atualizadas:</strong><?php echo $categorysUpdate ?></p>
	</div>
</section>
<!-- Quarta linha -->
<section class="row user-head-four">
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Produtos criados:</strong><?php echo $productsCreate ?></p>
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Produtos atualizados:</strong><?php echo $productsUpdate ?></p>
	</div>
</section>