<?php
App::uses('AppModel', 'Model');
/**
* JourneysTourist Model
*
* @property Journey $Journey
* @property Tourist $Tourist
*/
class JourneysTourist extends AppModel {


//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
* belongsTo associations
*
* @var array
*/
public $belongsTo = array(
'Journey' => array(
'className' => 'Journey',
'foreignKey' => 'journey_id',
'conditions' => '',
'fields' => '',
'order' => ''
),
'Tourist' => array(
'className' => 'Tourist',
'foreignKey' => 'tourist_id',
'conditions' => '',
'fields' => '',
'order' => ''
)
);
}