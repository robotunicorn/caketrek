<?php debug($journey); ?>

<div class="journeys view">
<h2><?php  echo __('Journey'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($journey['Journey']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leader'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journey['Leader']['first_name'], array('controller' => 'tourists', 'action' => 'view', $journey['Leader']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guide'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journey['Guide']['slogan'], array('controller' => 'guides', 'action' => 'view', $journey['Guide']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Track'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journey['Track']['id'], array('controller' => 'tracks', 'action' => 'view', $journey['Track']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journey['Zone']['id'], array('controller' => 'zones', 'action' => 'view', $journey['Zone']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guides'), array('controller' => 'guides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guide'), array('controller' => 'guides', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tourists'); ?></h3>
	<?php if (!empty($journey['Tourist'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th><?php echo __('Media Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($journey['Tourist'] as $tourist): ?>
		<tr>
			<td><?php echo $tourist['id']; ?></td>
			<td><?php echo $tourist['first_name']; ?></td>
			<td><?php echo $tourist['last_name']; ?></td>
			<td><?php echo $tourist['bio']; ?></td>
			<td><?php echo $tourist['media_id']; ?></td>
			<td><?php echo $tourist['user_id']; ?></td>
			<td><?php echo $tourist['created']; ?></td>
			<td><?php echo $tourist['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tourists', 'action' => 'view', $tourist['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tourists', 'action' => 'edit', $tourist['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tourists', 'action' => 'delete', $tourist['id']), null, __('Are you sure you want to delete # %s?', $tourist['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
