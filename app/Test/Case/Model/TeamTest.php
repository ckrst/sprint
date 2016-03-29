<?php

App::uses('Team', 'Model');

class TeamTest extends CakeTestCase {
    public $fixtures = array('app.team');

    public function setUp() {
        parent::setUp();
        $this->Article = ClassRegistry::init('Team');
    }

    public function testPublished() {
        $result = $this->Team->getAll(array('id', 'title'));
        $expected = array(
            array('Team' => array('id' => 1, 'title' => 'First Team')),
            array('Team' => array('id' => 2, 'title' => 'Second Team')),
            array('Team' => array('id' => 3, 'title' => 'Third Team'))
        );

        $this->assertEquals($expected, $result);
    }
}
