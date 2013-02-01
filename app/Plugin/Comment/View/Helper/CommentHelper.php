<?php

class CommentHelper extends AppHelper {

var $helpers = array('Form','Html');

public function view ($model) {
if ($model['Comment']){
?>	
<div>
Commentaires :<br>
<?php
for ($i=0; $i < count($model['Comment']); $i++) {
$comment = $model['Comment'][$i];
echo $comment['comment'];
echo $this->_View->element('delete', array('comment' => $comment),array('plugin' => 'Comment'));
echo "<br>";

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