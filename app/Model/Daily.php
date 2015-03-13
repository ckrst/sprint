<?php

App::uses('AppModel', 'Model');

class Daily extends AppModel {

	public $name = 'Daily';
	public $useTable = 'daily';
	public $displayField = 'date';
	public $order = 'Daily.date DESC';

	
	public $belongsTo = 'Sprint';
	public $hasMany = array(
		'ColumnValue' => array(
            'className' => 'ColumnValue'
        )
	);

}