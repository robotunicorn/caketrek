<?php

class CommentHelper extends AppHelper {

	var $helpers = array('Form','Html');

	public function view ($model) {
		if ($model['Comment']){
	?>	
		<div>
			Commentaires :
		<?php
		for ($i=0; $i < count($model['Comment']); $i++) { 
			echo $model['Comment'][$i]['comment'].',';
		}
		?>
		</div>
		<?php
		}
		else{
			?>
			<div>
			Soyez le premier à laisser un commentaire !
			</div>
			<?php
	}
	}

	public function add($model,$infos) {
		return $this->_View->element('form',array('model' => $model,'infos' =>$infos), array('plugin' => 'Comment'));
	}
}
