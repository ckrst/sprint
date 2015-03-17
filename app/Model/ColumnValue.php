<?php

App::uses('AppModel', 'Model');

class ColumnValue extends AppModel {

	public $useTable = 'col_value';
	public $displayField = 'value';
	
	public $belongsTo = array(
		'Daily' => array(
			'className' => 'Daily',
			'foreignKey' => 'daily_id'
		),
		'BacklogColumn' => array(
			'className' => 'BacklogColumn',
			'foreignKey' => 'col_id',
			'order' => 'order'
		)
	);
	//public $hasMany = 'Valor';

}