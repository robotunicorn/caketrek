<?php
echo $this->Form->create('Find');
echo $this->Form->input("search_text",array(
	'label'=>'Rechercher sur le site'
));
echo $this->Form->end("Rechercher");
if(isset($results)){
	
	if($total!=0){
		echo '<span style="font-size:13px" class="label label-success">Il y\'a '.$total.' résultats correspondant à votre recherche</span>';
		$user_ids=array();
		$hide_data=false;
		echo '<ul class="nav nav-tabs nav-stacked">';
		foreach($results as $type=>$type_result){

			$loops=0;
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
				if(!$hide_data){
					
					if($loops<1){
						echo '<li style="margin-top:15px; margin-bottom:5px;"><span style="font-size:13px" class="label label-info">'.$type.'</span></li>';
						$loops++;
					}
					if($type == "Journeys" AND !$fields['public']){
						echo '<li><a style="font-size:13px" class="alert alert-error">Journey privée</a></li>';
					}
					else{
						echo '<li>';
						echo $this->Html->link($fields[$fields['displayfield']], '/'.strtolower($type).'/view/'.$fields['id'], array('class' => 'button', 'target' => '_blank'));
						echo '</li>';
					}
				}
				$hide_data=false;
			}
		}
	echo '</ul>';
	}
	else{
		echo '<span style="font-size:13px" class="label label-defaut">Il n\'y a aucun résultat correspondant à votre recherche</span>';
	}
}
?>