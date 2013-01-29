
<?php
echo $this->Form->create('Find');
echo $this->Form->input("search_text",array(
	'label'=>'Rechercher sur le site'
));
echo $this->Form->end("Rechercher");
if(isset($results)){
	
	if($total!=0){
		echo 'Il y\'a '.$total.' résultats correspondant à votre recherche';
		$user_ids=array();
		$hide_data=false;
		
		foreach($results as $type=>$type_result){
			echo '<h3>';
			echo $type;
			echo '</h3>';
			echo '<ul class="nav nav-tabs nav-stacked">';
			
			foreach($type_result as $fields){
				
				if($type=="Tourists"){
					array_push($user_ids,$fields['user_id']);
				}
				
				else if($type=="Users"){
					foreach($user_ids as $v){
						if($fields['id']==$v){
							$hide_data = true;
						}
					}
				}
				
				else if($type=="Journeys"){
					if(!$fields['public']){
						$hide_data = true;
						echo '<li><a style="font-size:13px" class="alert alert-error">Journey privée</a></li>';
					}
				}
				
				if(!$hide_data){
					echo '<li>';
					echo $this->Html->link($fields[$fields['displayfield']], '/'.strtolower($type).'/view/'.$fields['id'], array('class' => 'button', 'target' => '_blank'));
					echo '</li>';
				}
				
				$hide_data=false;
			}
			echo '</ul>';
		}
	}
	else{
		echo 'Il n\' aucun résultat correspondant à votre recherche';
	}
}
?>