<?php
App::uses('AppController', 'Controller');
/**
 * Cities Controller
 *
 * @property City $City
 * @property PaginatorComponent $Paginator
 */
class CitiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->City->recursive = 0;

        /* get params from URLs */
        $this->Paginator->settings['paramType'] = 'querystring';
        $this->Paginator->settings = array('limit' => 5);

		$this->set('cities', $this->Paginator->paginate());
	}

    public function autocomplete($state_id = null, $autocomplete = '') {
        $this->request->allowMethod('post', 'get');

        /* catch params */
        if(isset($this->request->query['state_id']) && ($q = trim($this->request->query['state_id'])) && is_numeric($q)) {
            $state_id = $this->request->query['state_id']; // $param1 = $_REQUEST['param1']
        }

        if(isset($this->request->query['q']) && ($q = trim($this->request->query['q'])) && strlen($q)) {
            $autocomplete = $this->request->query['q'];
        }

        $cities = $this->City->find('list', array('conditions' => ['state_id' => $state_id, 'city LIKE' => "$autocomplete%"]));
        $this->set(compact('cities', 'state_id', 'autocomplete'));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		$options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
		$this->set('city', $this->City->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->City->create();
			if ($this->City->save($this->request->data)) {
				$this->Flash->set(__('The city has been saved.'), array('element' => 'SemanticFlash-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set(__('The city could not be saved. Please, try again.'), array('element' => 'SemanticFlash-alert'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->City->save($this->request->data)) {
				$this->Flash->set(__('The city has been saved.'), array('element' => 'SemanticFlash-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set(__('The city could not be saved. Please, try again.'), array('element' => 'SemanticFlash-alert'));
			}
		} else {
			$options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
			$this->request->data = $this->City->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->City->delete()) {
			$this->Flash->set(__('The city has been deleted.'), array('element' => 'SemanticFlash-success'));
		} else {
			$this->Flash->set(__('The city could not be deleted. Please, try again.'), array('element' => 'SemanticFlash-warning'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
