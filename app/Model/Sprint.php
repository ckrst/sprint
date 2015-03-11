<?php

App::uses('AppModel', 'Model');

class Sprint extends AppModel {

	public $useTable = 'sprint';
	public $displayField = 'name';
	
	public $belongsTo = 'Team';
	//public $hasMany = 'Valor';

}