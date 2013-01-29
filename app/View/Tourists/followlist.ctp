<div class="following index">
	<h2><?php echo __('Mes Abonnements'); ?> ı</h2>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('First Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Last Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Bio'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($followings['0']['Following'] as $following): ?>
	<tr>
		<td><?php echo ($following['id']); ?>&nbsp;</td>
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
	