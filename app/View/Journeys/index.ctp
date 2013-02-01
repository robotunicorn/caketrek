
<div class="journeys index">
	<h2><?php echo __('Latest Journeys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('tourist_id'); ?></th>
			<th><?php echo $this->Paginator->sort('guide_id'); ?></th>
			<th><?php echo $this->Paginator->sort('track_id'); ?></th>
			<th><?php echo $this->Paginator->sort('zone_id'); ?></th>
			<th><?php echo $this->Paginator->sort('about'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('public'); ?></th>
			<th><?php echo $this->Paginator->sort('crew'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($journeys as $journey): ?>
	<tr>
		<td><?php echo h($journey['Journey']['name']); ?>&nbsp;</td>
		<td><?php echo h($journey['Journey']['tourist_id']); ?>&nbsp;</td>
		<td><?php echo h($journey['Journey']['guide_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($journey['Track']['name'], array('controller' => 'tracks', 'action' => 'view', $journey['Track']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($journey['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $journey['Zone']['id'])); ?>
		</td>
		<td><?php echo h($journey['Journey']['about']); ?>&nbsp;</td>
		<td><?php echo h($journey['Journey']['body']); ?>&nbsp;</td>
		<td><?php echo h($journey['Journey']['public']); ?>&nbsp;</td>
		<td><?php echo h($journey['Journey']['crew']); ?>&nbsp;</td>
		<td><?php echo h($journey['Journey']['created']); ?>&nbsp;</td>
		<td><?php echo h($journey['Journey']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $journey['Journey']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $journey['Journey']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $journey['Journey']['id']), null, __('Are you sure you want to delete # %s?', $journey['Journey']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Journey'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		
		
	
	</ul>
</div>

<div class="journeys index">
<h2><?php echo __('Most Famous Tracks'); ?></h2>
<table cellpadding="0" cellspacing="0">
<?php 
	$i=0;
	foreach($famous_tracks as $v){
		if($i<1){
			echo "	<tr>";
			foreach($v['Track'] as $key => $value) {
	?>
	<th><?php echo $key ?></th>
	<?php
	}
	?>
	</tr>
	<?php
	$i++;
	}
	echo "	<tr>";
	foreach($v['Track'] as $key => $value){
	?>
		<th><?php echo $value ?></th>
		
	<?php
	}
 ?>
	</tr>

	<?php
}
?>	
</table>

</div>











