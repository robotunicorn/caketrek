<div class="journeysTourists view">
<h2><?php echo __('Journeys Tourist'); ?></h2>
<dl>
<dt><?php echo __('Id'); ?></dt>
<dd>
<?php echo h($journeysTourist['JourneysTourist']['id']); ?>
&nbsp;
</dd>
<dt><?php echo __('Journey'); ?></dt>
<dd>
<?php echo $this->Html->link($journeysTourist['Journey']['name'], array('controller' => 'journeys', 'action' => 'view', $journeysTourist['Journey']['id'])); ?>
&nbsp;
</dd>
<dt><?php echo __('Tourist'); ?></dt>
<dd>
<?php echo $this->Html->link($journeysTourist['Tourist']['first_name'], array('controller' => 'tourists', 'action' => 'view', $journeysTourist['Tourist']['id'])); ?>
&nbsp;
</dd>
<dt><?php echo __('Status'); ?></dt>
<dd>
<?php echo h($journeysTourist['JourneysTourist']['status']); ?>
&nbsp;
</dd>
</dl>
</div>
<div class="actions">
<h3><?php echo __('Actions'); ?></h3>
<ul>
<li><?php echo $this->Html->link(__('Edit Journeys Tourist'), array('action' => 'edit', $journeysTourist['JourneysTourist']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete Journeys Tourist'), array('action' => 'delete', $journeysTourist['JourneysTourist']['id']), null, __('Are you sure you want to delete # %s?', $journeysTourist['JourneysTourist']['id'])); ?> </li>
<li><?php echo $this->Html->link(__('List Journeys Tourists'), array('action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Journeys Tourist'), array('action' => 'add')); ?> </li>
<li><?php echo $this->Html->link(__('List Journeys'), array('controller' => 'journeys', 'action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Journey'), array('controller' => 'journeys', 'action' => 'add')); ?> </li>
<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
</ul>
</div>