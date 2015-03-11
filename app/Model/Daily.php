<?php

App::uses('AppModel', 'Model');

class Daily extends AppModel {

	public $useTable = 'daily';
	public $displayField = 'date';
	
	public $belongsTo = 'Sprint';
	//public $hasMany = 'Valor';

}