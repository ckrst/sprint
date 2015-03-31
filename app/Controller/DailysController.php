<?php
App::uses('AppController', 'Controller');

class DailysController extends AppController {


	public $uses = array('Team','Sprint', 'Daily', 'ColumnValue');

	public function index() {

		$this->set('daily', $this->Team->find('all'));
		
	}

	public function view($id) {
		$team = $this->Team->findById($id);


		$dailys = $this->Daily->find('all', array(
			'conditions' => array(
				'Sprint.team_id' => $id
				),
			'order' => array(
				'ddate DESC'
				)
			)
			
			);
			
		$this->set('team', $team);
		$this->set('dailys', $dailys);
	}

	public function add($teamId) {
		$team = $this->Team->findById($teamId);

		if ($this->request->is('post')) {

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
				$this->ColumnValue->saveMany($valData);

				return $this->redirect('/Dailys/view/' . $team['Team']['id']);	
			}
		}

		$this->set('team', $team);
	}

	public function delete($dailyId) {		
		$daily = $this->Daily->findById($dailyId);
		$team = $this->Team->findById($daily['Sprint']['team_id']);
		foreach ($daily['ColumnValue'] as $index => $columnValueItem) {
			$this->ColumnValue->delete($columnValueItem['id']);
		}
		$this->Daily->delete($dailyId);

		return $this->redirect('/Dailys/view/' . $team['Team']['id']);	
	}

}