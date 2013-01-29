<div class="journeysGuides view">
<h2><?php  echo __('Journeys Guide'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($journeysGuide['JourneysGuide']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Journey'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journeysGuide['Journey']['name'], array('controller' => 'journeys', 'action' => 'view', $journeysGuide['Journey']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guide'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journeysGuide['Guide']['slogan'], array('controller' => 'guides', 'action' => 'view', $journeysGuide['Guide']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Budget'); ?></dt>
		<dd>
			<?php echo h($journeysGuide['JourneysGuide']['budget']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($journeysGuide['JourneysGuide']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Journeys Guide'), array('action' => 'edit', $journeysGuide['JourneysGuide']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Journeys Guide'), array('action' => 'delete', $journeysGuide['JourneysGuide']['id']), null, __('Are you sure you want to delete # %s?', $journeysGuide['JourneysGuide']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Journeys Guides'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journeys Guide'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Journeys'), array('controller' => 'journeys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journey'), array('controller' => 'journeys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guides'), array('controller' => 'guides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guide'), array('controller' => 'guides', 'action' => 'add')); ?> </li>
	</ul>
</div>
