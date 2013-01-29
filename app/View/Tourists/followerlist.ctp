<div class="following index">
	<h2><?php echo __('People Who Follow me'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
		<th>ID</th>
		<th>Friend ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Bio</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	
	foreach ($followers['Follower'] as $following): ?>
	<tr>
		<td><?php echo ($following['id']); ?>&nbsp;</td>
		<td><?php echo ($following['Friend']['id']); ?>&nbsp;</td>
		<td><?php echo ($following['first_name']); ?>&nbsp;</td>
		<td><?php echo ($following['last_name']); ?>&nbsp;</td>
		<td><?php echo ($following['bio']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $following['id'])); ?>
		</td>
	</tr>
<?php  endforeach; ?>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('People I follow'), array('action' => 'followlist')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tourist'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
	