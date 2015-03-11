<?php

App::uses('AppModel', 'Model');

class Team extends AppModel {

	public $useTable = 'team';
	public $displayField = 'name';
	
	//public $belongsTo = 'Objeto';
	public $hasMany = array('Sprint', 'BacklogColumn');

}