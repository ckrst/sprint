<?php

App::uses('AppModel', 'Model');

class Daily extends AppModel {

	public $name = 'Daily';
	public $useTable = 'daily';
	public $displayField = 'ddate';
	public $order = 'Daily.ddate DESC';

	
	public $belongsTo = 'Sprint';
	public $hasMany = array(
		'ColumnValue' => array(
            'className' => 'ColumnValue'
        )
	);

}