<div class="users index">
	<div class="page-header">
	  <h1><?php echo __('My notifications'); ?> <small><?php echo $this->action; ?></small></h1>
	</div>
	<div class="subhead">
		<div class="subnav">
			<ul class="nav nav-pills">
				<li><?php echo $this->Html->link('Delete all', 'delete'); ?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<ul class="nav nav-list">
			  <?php
				foreach ($notifications as $notification): ?>
					
	
	<?php 
		$dateNotifParsed = date_parse($notification['Notification']['created']);

				if($dateNotifParsed['day'].$dateNotifParsed['month'].$dateNotifParsed['year'] == $todayParsed['day'].$todayParsed['month'].$todayParsed['year']){
					$prevItem = $item;
					$item = '<li class="nav-header">Today</li>';
					if($prevItem != $item){
						echo $item;
					}
				}elseif($dateNotifParsed['day'].$dateNotifParsed['month'].$dateNotifParsed['year']==$yesterdayParsed['day'].$yesterdayParsed['month'].$yesterdayParsed['year']){
					$prevItem = $item;
					$item = '<li class="nav-header">Yesterday</li>';
					if($prevItem != $item){
						echo $item;
					}
					
				}elseif($dateNotifParsed['month'].$dateNotifParsed['year']==$todayParsed['month'].$todayParsed['year']){
					$prevItem = $item;
					$item = '<li class="nav-header">'.$dateNotifParsed['day'].'/'.$dateNotifParsed['month'].'</li>';
					if($prevItem != $item){
						echo $item;
					}
				}else{
					$prevItem = $item;
					$item = '<li class="nav-header">More than one month ago</li>';
					if($prevItem != $item){
						echo $item;
					}

				}
				
		

	?>
	<li class="<?php if(!$notification['Notification']['viewed']){
							echo "active";
						}else{
							echo 'vu';
						} 
						?>">
						<a href="<?php echo $notification['Notification']['link']; ?>"><?php echo h($notification['Notification']['type']); ?></a>
			<span class="label badgeNav"><?php echo $dateNotifParsed['hour'];?>h<?php echo $dateNotifParsed['minute']; ?></span>			
	</li>



				<?php endforeach; ?>
			</ul>
		

		</div>
	</div>
</div>	


<?php echo $this->Form->postLink(__('Décliner'), array('action' => 'index', 2), null, __('Are you sure you want to delete?', 2)); ?>






