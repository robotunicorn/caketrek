<div class="points index">
	<h2><?php echo __('Points'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('lng'); ?></th>
			<th><?php echo $this->Paginator->sort('map_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($points as $point): ?>
	<tr>
		<td><?php echo h($point['Point']['id']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['name']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['lat']); ?>&nbsp;</td>
		<td><?php echo h($point['Point']['lng']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($point['Map']['name'], array('controller' => 'maps', 'action' => 'view', $point['Map']['id'])); ?>
		</td>
		<td><?php echo h($point['Point']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $point['Point']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $point['Point']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $point['Point']['id']), null, __('Are you sure you want to delete # %s?', $point['Point']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Point'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Maps'), array('controller' => 'maps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Map'), array('controller' => 'maps', 'action' => 'add')); ?> </li>
	</ul>
</div>
