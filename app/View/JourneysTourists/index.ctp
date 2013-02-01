<div class="journeysTourists index">
	<h2><?php echo __('Journeys Tourists'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('journey_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tourist_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($journeysTourists as $journeysTourist): ?>
	<tr>
		<td><?php echo h($journeysTourist['JourneysTourist']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($journeysTourist['Journey']['name'], array('controller' => 'journeys', 'action' => 'view', $journeysTourist['Journey']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($journeysTourist['Tourist']['first_name'], array('controller' => 'tourists', 'action' => 'view', $journeysTourist['Tourist']['id'])); ?>
		</td>
		<td><?php 
			echo $status[$journeysTourist['JourneysTourist']['status']];
			?>&nbsp;</td>
		<td>
			<?php 
			if( $status[$journeysTourist['JourneysTourist']['status']] == 'accepted' ){
				echo $this->Form->postLink(__('Reject'), array('action' => 'reject', $journeysTourist['JourneysTourist']['id']));
			}
			if( $status[$journeysTourist['JourneysTourist']['status']] == 'invited' ){
				echo $this->Form->postLink(__('Apply'), array('action' => 'apply', $journeysTourist['JourneysTourist']['id']));
				// On efface l'entrée si le tourist refuse
				echo $this->Form->postLink(__('Deny'), array('action' => 'delete', $journeysTourist['JourneysTourist']['id']), null, __('Are you sure you want to decline the journey?', $journeysTourist['JourneysTourist']['id']));
			}
			if( $status[$journeysTourist['JourneysTourist']['status']] == 'applied' ){
				echo $this->Form->postLink(__('Reject'), array('action' => 'delete', $journeysTourist['JourneysTourist']['id']), null, __('Are you sure you want to leave the journey?', $journeysTourist['JourneysTourist']['id']));
			}
			?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $journeysTourist['JourneysTourist']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $journeysTourist['JourneysTourist']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $journeysTourist['JourneysTourist']['id']), null, __('Are you sure you want to delete # %s?', $journeysTourist['JourneysTourist']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Journeys Tourist'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Journeys'), array('controller' => 'journeys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journey'), array('controller' => 'journeys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
	</ul>
</div>
