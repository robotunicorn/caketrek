

<div class="messages index">
	<h2><?php echo __('Your inbox'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>id</th>
			<th>sender_id</th>
			<th>message</th>
			<th>receiver_id</th>
			<th>date</th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
	foreach ($conversations as $msg): ?>
	<tr>
		<td><?php echo h($msg['Message']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($msg['Sender']['first_name'], array('controller' => 'tourists', 'action' => 'view', $msg['Sender']['id'])); ?>
		</td>
		<td><?php echo h($msg['Message']['message']); ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($msg['Receiver']['first_name'], array('controller' => 'tourists', 'action' => 'view', $msg['Receiver']['id'])); ?>
		</td>
		<td><?php echo h($msg['Message']['date']); ?>&nbsp;</td>
		<td class="actions">
			<?php 	if($msg['Message']['sender_id'] == 1){$view = $msg['Message']['receiver_id'];}
					else{$view = $msg['Message']['sender_id'];}?>
			<?php echo $this->Html->link(__('View conversation'), array('action' => 'view', $view)); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	

	</table>
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Message'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sender'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
	</ul>
</div>

