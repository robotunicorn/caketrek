<div class="journeysGuides index">
	<h2><?php echo __('Journeys Guides'); ?></h2>
	<?php //$guideid = 2 ?>
	<table cellpadding="0" cellspacing="0">
	
	<?php foreach ($journeysGuides as $journeysGuide): ?>

	<tr>
			<td><?php echo h($journeysGuide['JourneysGuide']['id']); ?>&nbsp;</td>
			<td>
				<?php  echo $this->Html->link($journeysGuide['Journey']['name'], array('controller' => 'journeys', 'action' => 'view', $journeysGuide['Journey']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($journeysGuide['Guide']['slogan'], array('controller' => 'guides', 'action' => 'view', $journeysGuide['Guide']['id'])); ?>
			</td>
			<td><?php echo h($journeysGuide['JourneysGuide']['budget']); ?>&nbsp;</td>
			<td><?php echo h($journeysGuide['JourneysGuide']['status']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Voir'), array('action' => 'view', $journeysGuide['JourneysGuide']['id'])); ?>
				<?php if(isset($guideid)){echo $this->Html->link(__('Faire une proposition'), array('action' => 'edit', $journeysGuide['JourneysGuide']['id']));}else{echo $this->Html->link(__('Modifier l\'offre'), array('action' => 'edit', $journeysGuide['JourneysGuide']['id']));} ?>
				<?php echo $this->Form->postLink(__('Décliner'), array('action' => 'delete', $journeysGuide['JourneysGuide']['id']), null, __('Are you sure you want to delete # %s?', $journeysGuide['JourneysGuide']['id'])); ?>
				<?php if(!isset($guideid)){echo $this->Form->postLink(__('Accepter'), array('action' => 'accept', $journeysGuide['JourneysGuide']['id']));} ?>
			</td>
	</tr>
		<?php endforeach; ?>

	</table>
	


</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Journeys Guide'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Journeys'), array('controller' => 'journeys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journey'), array('controller' => 'journeys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guides'), array('controller' => 'guides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guide'), array('controller' => 'guides', 'action' => 'add')); ?> </li>
	</ul>
</div>
