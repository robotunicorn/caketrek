<div class="following index">
	<h2><?php echo __('Mes Abonnements'); ?> ı</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('First Name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	debug($followings['0']['Following']);
	foreach ($followings['0']['Following'] as $following): ?>
	<tr>
		<?php var_dump($following);?>
		<td><?php echo ($following['id']); ?>&nbsp;</td>
		<td><?php echo ($following['first_name']); ?>&nbsp;</td>
		
	</tr>
<?php  endforeach; ?>
	</table>
</div>
	