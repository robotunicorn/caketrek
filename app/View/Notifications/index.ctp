<div class="notifications index">
	<h2><?php echo __('Notifications'); ?></h2>
	<table cellpadding="0" cellspacing="0">

	<?php
	foreach ($notifications as $notification): ?>
	<tr class="<?php if(!$notification['Notification']['viewed']){
			echo "non-vu";
		}else{
			echo 'vu';
		} 
		?>">
		<td><a href="<?php echo $notification['Notification']['link']; ?>"><?php echo h($notification['Notification']['type']); ?></a></td>
		<td><?php echo h($notification['Notification']['created']); ?></td>
	</tr>
<?php endforeach; ?>
	</table>

</div>
