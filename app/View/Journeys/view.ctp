
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
		<dt><?php echo __('Track'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journey['Track']['name'], array('controller' => 'tracks', 'action' => 'view', $journey['Track']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zone'); ?></dt>
		<dd>
			<?php echo $this->Html->link($journey['Zone']['name'], array('controller' => 'zones', 'action' => 'view', $journey['Zone']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Guides'), array('controller' => 'guides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Guide'), array('controller' => 'guides', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Tourists'); ?></h3>
	<?php if (!empty($journey['tourist'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $journey['tourist']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
	<?php echo $journey['tourist']['first_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
	<?php echo $journey['tourist']['last_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
	<?php echo $journey['tourist']['bio']; ?>
&nbsp;</dd>
		<dt><?php echo __('Media Id'); ?></dt>
		<dd>
	<?php echo $journey['tourist']['media_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $journey['tourist']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $journey['tourist']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $journey['tourist']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Tourist'), array('controller' => 'tourists', 'action' => 'edit', $journey['Tourist']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related Guides'); ?></h3>
	<?php if (!empty($journey['Guide'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $journey['Guide']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Slogan'); ?></dt>
		<dd>
	<?php echo $journey['Guide']['slogan']; ?>
&nbsp;</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
	<?php echo $journey['Guide']['description']; ?>
&nbsp;</dd>
		<dt><?php echo __('Tourist Id'); ?></dt>
		<dd>
	<?php echo $journey['Guide']['tourist_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Validated'); ?></dt>
		<dd>
	<?php echo $journey['Guide']['validated']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $journey['Guide']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $journey['Guide']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Guide'), array('controller' => 'guides', 'action' => 'edit', $journey['Guides']['id'])); ?></li>
			</ul>
		</div>
	</div>
	