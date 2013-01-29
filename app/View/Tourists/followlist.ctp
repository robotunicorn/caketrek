<div class="following index">
	<h2><?php echo __('People I\'m Following'); ?></h2>
	<?php debug($followings); ?>
	<table cellpadding="0" cellspacing="0">
	
	<?php
	
	foreach ($followings['Following'] as $following): ?>
	<tr>
		<td><?php echo ($following['id']); ?>&nbsp;</td>
		<td><?php echo ($following['Friend']['id']); ?>&nbsp;</td>
		<td><?php echo ($following['first_name']); ?>&nbsp;</td>
		<td><?php echo ($following['last_name']); ?>&nbsp;</td>
		<td><?php echo ($following['bio']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $following['id'])); ?>
			<?php echo $this->Form->postLink(__('Unfriend'), array('action' => 'unfriend', $following['Friend']['id']), null, __('Are you sure you want to unfriend # %s?', $following['Friend']['id'])); ?>
		</td>
	</tr>
<?php  endforeach; ?>
	</table>

</div>
	