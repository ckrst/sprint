<?php

App::uses('AppModel', 'Model');

class BacklogColumn extends AppModel {

	public $useTable = 'backlog_col';
	public $displayField = 'name';
	public $order = 'order';
	
	//public $belongsTo = 'Team';
	//public $hasMany = 'Valor';

}