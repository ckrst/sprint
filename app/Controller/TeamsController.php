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

		$lastDaily = $this->Daily->find('first', array(
			'order' => array('date DESC')
			));

		$spr['Sprint'] = $lastDaily['Sprint'];

		$values = $this->ColumnValue->find('all', array(
			'conditions' => array(
				'Daily.sprint_id' => $spr['Sprint']['id']
				),
			));

		$this->set('dailys', $this->Daily->find('all', array(
			'conditions' => array(
				'sprint_id' => $spr['Sprint']['id']
				),
			'order' => array(
				'date ASC'
				)

			)));

		$this->set('team', $team);
		$this->set('sprint', $spr);
		$this->set('values', $values);


		foreach ($values as $valueItem) {
			$matrix[$valueItem['BacklogColumn']['name']][$valueItem['Daily']['date']] = $valueItem['ColumnValue']['value'];
		}

		//die(var_dump($matrix));
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


		$dailys = $this->Daily->find('all', array(
			'conditions' => array(
				'Sprint.team_id' => $id
				),
			'order' => array(
				'date DESC'
				)
			)
			
			);

		$this->set('team', $team);
		$this->set('dailys', $dailys);
	}

	public function addDaily($teamId) {
		$team = $this->Team->findById($teamId);

		if ($this->request->is('post')) {
			//echo "<PRE>";
			//die(var_dump($this->request->data));



			$this->Daily->create();
			if ($this->Daily->save($this->request->data)) {
				$dailyId = $this->Daily->id;


				$valData = array();
				foreach ($this->request->data['ColumnValue'] as $index => $columnValueItem) {
					$this->request->data['ColumnValue'][$index]['daily_id'] = $dailyId;

					$valItem = array(
						'col_id' => $this->request->data['ColumnValue'][$index]['col_id'],
						'value' => $this->request->data['ColumnValue'][$index]['value'],
						'daily_id' => $dailyId
					);

					array_push($valData, $valItem);

				}
				//die(var_dump($this->request->data));
				$this->ColumnValue->saveMany($valData);

				return $this->redirect('/Teams/daily/' . $team['Team']['id']);	
			}
		}

		$this->set('team', $team);
	}
}