<div class="following index">
	<div class="page-header">
	<h1><?php echo __('People Who Follow me'); ?> <small>My minions</small></h1>
	</div>
	<div class="subhead">
		<div class="subnav">
			<ul class="nav nav-pills">
				<li><?php echo $this->Html->link(__('People I follow'), array('action' => 'followlist')); ?> </li>
				<li><?php echo $this->Html->link(__('List Tourists'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Tourist'), array('action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<table class="table table-bordered table-striped">
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
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $following['id']), array('class' => 'btn')); ?>
					<?php echo $this->Html->link(__('Message'), array('action' => 'view', $following['id']), array('class' => 'btn btn-primary')); ?>
				</td>
			</tr>
		<?php  endforeach; ?>
			</table>
		</div>
	</div>

</div>