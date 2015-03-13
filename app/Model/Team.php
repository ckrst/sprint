<?php

App::uses('AppModel', 'Model');

class Team extends AppModel {

	public $useTable = 'team';
	public $displayField = 'name';
	
	//public $belongsTo = 'Objeto';
	public $hasMany = array(
		

		'Sprint' => array(
            'className' => 'Sprint',
            'foreignKey' => 'team_id',
            'order' => 'Sprint.start'
        ),

        'BacklogColumn' => array(
            'className' => 'BacklogColumn',
            'foreignKey' => 'team_id',
            'order' => 'BacklogColumn.order'
        )

	);

}