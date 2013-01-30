<div class="journeys view">
<h2><?php  echo __('Journey'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tourist Id'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['tourist_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guide Id'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['guide_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Track Id'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['track_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zone Id'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['zone_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('About'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['about']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Public'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['public']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Crew'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['crew']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Journey'), array('action' => 'edit', $journey['Journey']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Journey'), array('action' => 'delete', $journey['Journey']['id']), null, __('Are you sure you want to delete # %s?', $journey['Journey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Journeys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journey'), array('action' => 'add')); ?> </li>
	</ul>
</div>
