<?php

class TeamsControllerTest extends ControllerTestCase {
    # public $fixtures = array('app.team');

    public function testIndex() {
        $result = $this->testAction('/teams/index');
        debug($result);
    }


}
