<?php
App::uses('AppController', 'Controller');

class BacklogColumnsController extends AppController {


	public $uses = array('Team', 'BacklogColumn', 'ColumnValue');

	public function index() {

		$this->set('teams', $this->Team->find('all'));
		
	}

	public function view($id) {
		$team = $this->Team->findById($id);

		$columns = $team['BacklogColumn'];
		$this->set('team', $team);
		$this->set('columns', $columns);
	}

	public function add($teamId) {
		$teams = $this->Team->find('all');
		$this->set('teams', $teams);
		if ($this->request->is('post')) {
			$this->BacklogColumn->create();
			if ($this->BacklogColumn->save($this->request->data)) {
			}
			return $this->redirect('/BacklogColumns/view/' . $teamId);	
		}
	}

	public function delete($backlogColumnId) {		
		$backlogColumn = $this->BacklogColumn->findById($backlogColumnId);
		$columnValueItem = $this->ColumnValue->deleteAll(array('ColumnValue.col_id' => $backlogColumnId), false);
		$this->BacklogColumn->delete($backlogColumnId);

		return $this->redirect('/BacklogColumns/view/' . $backlogColumn['BacklogColumn']['team_id']);	
	}
}