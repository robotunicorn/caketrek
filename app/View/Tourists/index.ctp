<div class="tourists index">
	<div class="page-header">
		<h1><?php echo __('Tourists'); ?> <small>One list to rule them all</small></h1>
	</div>

	<div class="subhead">
		<div class="subnav">
			<ul class="nav nav-pills">
				<li><?php echo $this->Html->link(__('New Tourist'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Followers'), array('action' => 'followerlist')); ?> </li>
				<li><?php echo $this->Html->link(__('People I follow'), array('action' => 'followlist')); ?> </li>
			</ul>
		</div>
	</div>


	<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('bio'); ?></th>
			<th><?php echo $this->Paginator->sort('media_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($tourists as $tourist): ?>
	<tr>
		<td><?php echo h($tourist['Tourist']['id']); ?>&nbsp;</td>
		<td><?php echo $tourist['Tourist']['first_name'].' '.$tourist['Tourist']['last_name']; ?>&nbsp;</td>
		<td><?php echo h($tourist['Tourist']['bio']); ?>&nbsp;</td>
		<td><?php echo h($tourist['Tourist']['media_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tourist['User']['username'], array('controller' => 'users', 'action' => 'view', $tourist['User']['id'])); ?>
		</td>
		<td><?php echo h($tourist['Tourist']['created']); ?>&nbsp;</td>
		<td><?php echo h($tourist['Tourist']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tourist['Tourist']['id']), array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tourist['Tourist']['id']), array('class' => 'btn btn-info')); ?>

			<?php echo $this->Form->postLink(__('Follow'), array('action' => 'follow', $tourist['Tourist']['id']), array('class'=>'btn btn-success', 'escape' => false)); ?>


			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tourist['Tourist']['id']),array('class'=>'btn btn-danger', 'escape' => false), null, __('Are you sure you want to delete # %s?', $tourist['Tourist']['id'])); ?>
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
