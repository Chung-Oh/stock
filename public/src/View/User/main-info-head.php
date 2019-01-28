<section class="row user-head-top">
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Logado como:</strong><?php echo $user->getName() ?></p>			
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Criado:</strong><?php echo dateFull($user->getCreatedAt()) ?></p>
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Atualizado:</strong><?php echo dateFull($user->getUpdatedAt()) ?></p>
	</div>
</section>
<!-- Segunda linha -->
<section class="row user-head-down">
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Nº acesso:</strong><?php echo count($logList) ?></p>
	</div>	
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Último acesso:</strong><?php echo lastAccess($logList) ?></p>
	</div>
	<div class="info user-head-info">
		<p><strong class="info-head-strong">Início da sessão:</strong><?php echo initAccess($logList) ?></p>
	</div>
</section>