<?php

class TeamFixture extends CakeTestFixture {
    public $import = 'Team';
    public $records = array(
        array(
          'id' => 1,
          'name' => 'First Team',
          'method' => 'KANBAN',
        ),
        array(
          'id' => 2,
          'name' => 'Second Team',
          'method' => 'SCRUM',
        ),
        array(
          'id' => 3,
          'name' => 'Third Team',
          'method' => 'KANBAN',
        )
    );
}
