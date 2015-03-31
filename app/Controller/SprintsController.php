<?php
App::uses('AppController', 'Controller');

class SprintsController extends AppController {

	public $uses = array('Team', 'Sprint', 'Daily', 'ColumnValue');

	public function index() {

		$this->set('sprint', $this->Team->find('all'));
	}

	public function view($id) {
		$team = $this->Team->findById($id);

		$sprints = $team['Sprint'];
		$this->set('team', $team);
		$this->set('sprints', $sprints);
	}

	public function add($teamId) {
		$team = $this->Team->findById($teamId);

		if ($this->request->is('post')) {
			$this->Sprint->create();
			if ($this->Sprint->save($this->request->data)) {
			}
			return $this->redirect('/Sprints/view/' . $team['Team']['id']);	
		}
	}

	public function delete($sprintId) {		
		$sprint = $this->Sprint->findById($sprintId);
		$team = $this->Team->findById($sprint['Team']['id']);
		
		foreach ($sprint['Daily'] as $index => $dailyValueItem) {
			$daily = $this->Daily->findById($dailyValueItem['id']);
			foreach ($daily['ColumnValue'] as $index => $columnValueItem) {
				$this->ColumnValue->delete($columnValueItem['id']);
			}
			$this->Daily->delete($dailyValueItem['id']);
		}
		$this->Sprint->delete($sprintId);

		return $this->redirect('/Sprints/view/' . $team['Team']['id']);	
	}
}