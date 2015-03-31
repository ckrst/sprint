<?php
App::uses('AppController', 'Controller');

class TeamsController extends AppController {


	public $uses = array('Team', 'BacklogColumn', 'Sprint', 'Daily', 'ColumnValue');

	public function index() {

		$this->set('teams', $this->Team->find('all'));
		
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Team->create();
			if ($this->Team->save($this->request->data)) {
			}
			return $this->redirect(array('action' => 'index'));	
		}
	}

	public function view($id) {
		$team = $this->Team->findById($id);
		//echo "<PRE>";
		//die(var_dump($team));

		$spr = $this->Sprint->find('first', array(
			'conditions' => array(
				'Sprint.team_id' => $id
				),
			'order' => array(
				'start'
				)
			));

		$values = $this->ColumnValue->find('all', array(
			'conditions' => array(
				'Daily.sprint_id' => $spr['Sprint']['id']
				),
			'order' => array(
				'Daily.ddate ASC'
				)
			));

		$this->set('dailys', $this->Daily->find('all', array(
			'conditions' => array(
				'sprint_id' => $spr['Sprint']['id']
				),
			'order' => array(
				'ddate ASC'
				)

			)));

		$this->set('team', $team);
		$this->set('sprint', $spr);
		$this->set('values', $values);   	

		foreach ($values as $valueItem) {
			$matrix[$valueItem['BacklogColumn']['name']][$valueItem['Daily']['ddate']] = $valueItem['ColumnValue']['value'];
		}

		$this->set('matrix', $matrix);
		
	}

	public function cols($id) {
		$team = $this->Team->findById($id);

		$columns = $team['BacklogColumn'];
		$this->set('team', $team);
		$this->set('columns', $columns);
	}

	public function addCol($teamId) {
		$team = $this->Team->findById($teamId);

		if ($this->request->is('post')) {
			$this->BacklogColumn->create();
			if ($this->BacklogColumn->save($this->request->data)) {
			}
			return $this->redirect('/Teams/cols/' . $team['Team']['id']);	
		}
	}
}