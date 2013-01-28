<?php echo $this->Form->create(array(
	'action'=>'find'
	)); ?>

<?php echo $this->Form->input("search_text",array(
	'label'=>'Rechercher'
));?>

<?php echo $this->Form->end("Rechercher"); ?>
