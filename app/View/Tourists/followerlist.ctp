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
	