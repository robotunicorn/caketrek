<?php
	$url = Router::url(array('controller' => 'comments', 'action' => 'delete', 'plugin' => 'comment', $comment['id']));
	echo '<div><a href="'.$url.'" class="deleteCom">X</a></div>';
?>
