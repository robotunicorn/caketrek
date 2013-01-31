<?php
	$url = Router::url(array('controller' => 'comments', 'action' => 'delete', 'plugin' => 'comment', $comment['id']));
	echo '<span class="label"><a href="'.$url.'">X</a></span>';
?>
