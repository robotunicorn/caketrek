		<div class="comments">
		<? echo $this->Form->create('Comment', array( 'url' => array('controller' => 'comments', 'action' => 'add', 'plugin' => 'comment'))); ?>
			
				<h3><?php echo __('Add Comment'); ?></h3>
			<?php

				$models = array();
			    foreach($model AS $nom=>$donnee)
				    {
				        array_push($models, $nom);
				    } 
				$object_id=$infos['id'];
				$object_type=$models[0];
				echo $this->Form->input('comment', array('class' => 'span9'));
				echo $this->Form->input('note', array('options' => array(1, 2, 3, 4, 5),
    'empty' => '(choisissez)'));
				echo $this->Form->input('object_id',array('value' => $object_id,'type'=>'hidden'));
				echo $this->Form->input('object_type',array('value' => $object_type,'type'=>'hidden'));
			?>
			
		<?php echo $this->Form->end(__('Submit')); ?>
		</div>