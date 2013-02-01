<div class="maps view">
<h2><?php  echo __('Map'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($map['Map']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($map['Map']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($map['Map']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Map'), array('action' => 'edit', $map['Map']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Map'), array('action' => 'delete', $map['Map']['id']), null, __('Are you sure you want to delete # %s?', $map['Map']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Maps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Map'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
<style type="text/css">
    #container{width:990px;margin:auto;}
    #container #map{width:500px;height:500px;margin:auto;}
  </style>
    <div id="container">
        <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
        </div>
    </div>
 
    <!-- Include Javascript -->

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
   <!-- <script type="text/javascript" src="../../js/map_single_marker.js"></script>-->
   <script type="text/javascript" src="../../js/map_markers.js"></script>
<div class="related">
	<h3><?php echo __('Related Points'); ?></h3>
	<?php if (!empty($map['Point'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th><?php echo __('Map Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($map['Point'] as $point): ?>
		<tr>
			<td><?php echo $point['id']; ?></td>
			<td><?php echo $point['name']; ?></td>
			<td><?php echo $point['lat']; ?></td>
			<td><?php echo $point['lng']; ?></td>
			<td><?php echo $point['map_id']; ?></td>
			<td><?php echo $point['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'points', 'action' => 'view', $point['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'points', 'action' => 'edit', $point['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'points', 'action' => 'delete', $point['id']), null, __('Are you sure you want to delete # %s?', $point['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add', $map['Map']['id'])); ?> </li>
		</ul>
	</div>
</div>

<script>

var coords = [
<?php foreach ($map['Point'] as $point): ?>
  {'lat':<?php echo $point['lat']; ?>, 'lng':<?php echo $point['lng']; ?>, 'title': '<?php echo $point['name']; ?>'},
<?php endforeach; ?>
]

initialize(coords);


</script>
