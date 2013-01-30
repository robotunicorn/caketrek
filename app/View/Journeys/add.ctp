<div class="journeys form">
<?php echo $this->Form->create('Journey'); ?>
	<fieldset>
		<legend><?php echo __('Add Journey'); ?></legend>
	<?php
	
		echo $this->Form->input('name');
		echo $this->Form->input('zone_id');
		echo $this->Form->input('track_id');
		echo $this->Form->input('about');
		echo $this->Form->input('public', array('type' => 'checkbox'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Create')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Journeys'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guides'), array('controller' => 'guides', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
