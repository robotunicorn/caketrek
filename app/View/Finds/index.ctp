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
		foreach($results as $type=>$type_result){
			echo '<h3>';
			echo $type;
			echo '</h3>';
			echo '<ul>';
			foreach($type_result as $fields){
				
				foreach($fields as $field_name => $field_values){
					
					echo '<li>'.$field_values.'</li>';
					
				}
			}
			echo '</ul>';
		}
	}
	else{
		echo 'Il n\' aucun résultat correspondant à votre recherche';
	}
}
?>