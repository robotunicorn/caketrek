<?php

class CommentBehavior extends ModelBehavior{

	function setup($model,$options= array()){

		$model->hasMany = array(
        	'Comment' => array(
	        	'associationForeignKey' => 'comment_id',
	            'className'     => 'Comment',
	            'foreignKey'    => 'object_id',
	            'conditions'    => array('Comment.object_type' => $model->name,'Comment.object_id' => $model->id),
       		)
		);
	}
}
