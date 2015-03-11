<?php

App::uses('AppModel', 'Model');

class ColumnValue extends AppModel {

	public $useTable = 'backlog_col';
	public $displayField = 'name';
	
	public $belongsTo = array('Daily', 'BacklogColumn');
	//public $hasMany = 'Valor';

}