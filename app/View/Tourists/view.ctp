<div class="tourists view">
	<div class="page-header">
		<h1><?php  echo __('Tourist'); ?> <small><?php echo h($tourist['Tourist']['first_name']); ?> <?php echo h($tourist['Tourist']['last_name']); ?></small></h1>
	</div>
	<div class="subhead">
		<div class="subnav">
			<ul class="nav nav-pills">
				<li><?php echo $this->Form->postLink(__('Follow'), array('action' => 'follow', $tourist['Tourist']['id'])); ?></li>
				<li><?php echo $this->Html->link(__('Edit Tourist'), array('action' => 'edit', $tourist['Tourist']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Tourist'), array('action' => 'delete', $tourist['Tourist']['id']), null, __('Are you sure you want to delete # %s?', $tourist['Tourist']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Tourists'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Tourist'), array('action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span9">


		
		<h3><?php echo __('Bio'); ?></h3>
		<div class="well">
			<?php echo h($tourist['Tourist']['bio']); ?>
			&nbsp;
		</div>

		<p><?php echo __('User'); ?> : 
			<?php echo $this->Html->link($tourist['User']['username'], array('controller' => 'users', 'action' => 'view', $tourist['User']['id'])); ?>
	</div>
	<div class="span3">
		Badges :
	
	<?php
	for ($i=0; $i < count($tourist['Badge']); $i++) { 

		echo '<span class="label label-info">'.$tourist['Badge'][$i]['label'].'</span> ';
	}
	?>
	</div>

	</div>
</div>
