<?php debug($conversation); ?>

<div class="messages index">
	<h2><?php echo __('My conversation with :'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>id</th>
			<th>sender_id</th>
			<th>message</th>
			<th>receiver_id</th>
			<th>date</th>

			
	</tr>
	
	<?php
	foreach ($conversation as $msg): ?>
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
		
	</tr>
<?php endforeach; ?>
	

	</table>
	
</div>


