<?php

App::uses('AppModel', 'Model');

class Sprint extends AppModel {

	public $useTable = 'sprint';
	public $displayField = 'name';
	
	public $belongsTo = 'Team';
	public $hasMany = array(
		'Daily' => array(
			'className' => 'Daily',
			'foreign_key' => 'daily_id'
			)
	);

}