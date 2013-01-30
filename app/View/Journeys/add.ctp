<div class="journeys form">
<?php echo $this->Form->create('Journey'); ?>
	<fieldset>
		<legend><?php echo __('Add Journey'); ?></legend>
	<?php
		echo $this->Form->input('tourist_id');
		echo $this->Form->input('guide_id');
		echo $this->Form->input('track_id');
		echo $this->Form->input('zone_id');
		echo $this->Form->input('name');
		echo $this->Form->input('about');
		echo $this->Form->input('body');
		echo $this->Form->input('public');
		echo $this->Form->input('crew');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Journeys'), array('action' => 'index')); ?></li>
	</ul>
</div>
