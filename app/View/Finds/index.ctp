<?php
echo $this->Form->create('Find');
echo $this->Form->input("search_text",array(
	'label'=>'Rechercher'
));
echo $this->Form->end("Rechercher");

if(isset($results)){
	
	if($total!=0){
		echo 'Il y\'a '.$total.' résultats correspondant à votre recherche';
		debug($results);
	}
	else{
		echo 'Il n\' aucun résultat correspondant à votre recherche';
	}
}
?>