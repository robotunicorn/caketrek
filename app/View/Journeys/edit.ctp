<div class="journeys form">
<?php echo $this->Form->create('Journey'); ?>
	<fieldset>
		<legend><?php echo __('Edit Journey'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('tourist_id');
		echo $this->Form->input('guide_id');
		echo $this->Form->input('zone_id');	
		echo $this->Form->input('about');
		echo $this->Form->input('body');
		echo $this->Form->input('public', array('type' => 'checkbox'));
		echo $this->Form->input('crew');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Journey.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Journey.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Journeys'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guides'), array('controller' => 'guides', 'action' => 'index')); ?> </li>
	</ul>
</div>
