<div class="guides view">
<h2><?php  echo __('Guide'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($guide['Guide']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slogan'); ?></dt>
		<dd>
			<?php echo h($guide['Guide']['slogan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($guide['Guide']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tourist'); ?></dt>
		<dd>
			<?php echo $this->Html->link($guide['Tourist']['first_name'], array('controller' => 'tourists', 'action' => 'view', $guide['Tourist']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validated'); ?></dt>
		<dd>
			<?php echo h($guide['Guide']['validated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($guide['Guide']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($guide['Guide']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Guide'), array('action' => 'edit', $guide['Guide']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Guide'), array('action' => 'delete', $guide['Guide']['id']), null, __('Are you sure you want to delete # %s?', $guide['Guide']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Guides'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guide'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Journeys'), array('controller' => 'journeys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Journey'), array('controller' => 'journeys', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Journeys'); ?></h3>
	<?php if (!empty($guide['Journey'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tourist Id'); ?></th>
		<th><?php echo __('Guide Id'); ?></th>
		<th><?php echo __('Track Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('About'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Public'); ?></th>
		<th><?php echo __('Crew'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($guide['Journey'] as $blabla): ?>
		<tr>
			<td><?php echo $blabla['id']; ?></td>
			<td><?php echo $blabla['tourist_id']; ?></td>
			<td><?php echo $blabla['guide_id']; ?></td>
			<td><?php echo $blabla['track_id']; ?></td>
			<td><?php echo $blabla['zone_id']; ?></td>
			<td><?php echo $blabla['name']; ?></td>
			<td><?php echo $blabla['about']; ?></td>
			<td><?php echo $blabla['body']; ?></td>
			<td><?php echo $blabla['public']; ?></td>
			<td><?php echo $blabla['crew']; ?></td>
			<td><?php echo $blabla['created']; ?></td>
			<td><?php echo $blabla['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'journeys', 'action' => 'view', $blabla['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'journeys', 'action' => 'edit', $blabla['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'journeys', 'action' => 'delete', $blabla['id']), null, __('Are you sure you want to delete # %s?', $blabla['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Journey'), array('controller' => 'journeys', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
