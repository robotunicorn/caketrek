
	<div>
		Commentaires :
	<?php
	for ($i=0; $i < count($tourist['Comment']); $i++) { 
		echo $tourist['Comment'][$i]['comment'].',';
	}
	?>

	</div>


	<div class="comments form">
	<?php echo $this->Form->create('Comment'); ?>
		<fieldset>
			<legend><?php echo __('Add Comment'); ?></legend>
		<?php
			echo $this->Form->input('comment');
			echo $this->Form->input('note');


		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>
	