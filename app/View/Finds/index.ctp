<?php
if(isset($message)){
	echo $message;
}
?>
<?php echo $this->Form->create('Find') ?>

<?php echo $this->Form->input("search_text",array(
	'label'=>'Rechercher'
));?>

<?php echo $this->Form->end("Rechercher"); ?>

<?php if (isset($results)): ?>
	Il y'a <?php echo $results['total']; ?> résultats.
<?php endif ?>