<?php

class CommentHelper extends AppHelper {

	var $helpers = array('Form','Html');

	public function view ($model) {


		if ($model['Comment']){
	?>	
		<div>
			<h3>Commentaires :</h3>
		<?php
		for ($i=0; $i < count($model['Comment']); $i++) {
			$comment = $model['Comment'][$i];

			echo '<div style="border-bottom:solid 1px #CCC;">';
			if ($comment['user_id']) {
				echo '<h4>';
				echo 'Auteur : '.$comment['user_id'];
				echo '</h4>';
			}
			echo "<p>Commentaire : ".$comment['comment']."</p>";
			echo "<p>";
			for ($k=0; $k<$comment['note']; $k++){
				echo '<img src="http://upload.wikimedia.org/wikipedia/commons/f/f0/Star_Ouro.gif" width="15p#x" height="15px" />';
			}
			for ($j=$comment['note']; $j<5; $j++){
				echo '<img  src="http://upload.wikimedia.org/wikipedia/commons/e/ea/Star_Prata.gif" width="15px" height="15px" />';
			}
			echo "</p>";
			echo $this->_View->element('delete', array('comment' => $comment),array('plugin' => 'Comment'));

			echo '</div>';

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
