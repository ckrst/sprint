<?php
App::uses('AppController', 'Controller');

class TeamsController extends AppController {


	public $uses = array('Team', 'BacklogColumn', 'Sprint', 'Daily');

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
		$this->set('team', $team);
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

	public function sprints($id) {
		$team = $this->Team->findById($id);

		$sprints = $team['Sprint'];
		$this->set('team', $team);
		$this->set('sprints', $sprints);
	}

	public function addSprint($teamId) {
		$team = $this->Team->findById($teamId);

		if ($this->request->is('post')) {
			$this->Sprint->create();
			if ($this->Sprint->save($this->request->data)) {
			}
			return $this->redirect('/Teams/sprints/' . $team['Team']['id']);	
		}
	}

	public function daily($id) {
		$team = $this->Team->findById($id);


		$dailys = $this->Daily->find('all');

		$this->set('team', $team);
		$this->set('dailys', $dailys);
	}

	public function addDaily($teamId) {
		$team = $this->Team->findById($teamId);

		if ($this->request->is('post')) {
			echo "<PRE>";
			die(var_dump($this->request->data));
			$this->Daily->create();
			if ($this->Daily->save($this->request->data)) {
			}
			return $this->redirect('/Teams/daily/' . $team['Team']['id']);	
		}

		$this->set('team', $team);
	}
}