<?php
App::uses('AppController', 'Controller');
/**
 * Rentals Controller
 *
 * @property Rental $Rental
 * @property PaginatorComponent $Paginator
 */
class RentalsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Rental->recursive = 0;
		$this->set('rentals', $this->Paginator->paginate());
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Rental->recursive = 0;
		$this->set('rentals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Rental->exists($id)) {
			throw new NotFoundException(__('Invalid rental'));
		}
		$options = array('conditions' => array('Rental.' . $this->Rental->primaryKey => $id));
		$this->set('rental', $this->Rental->find('first', $options));

		$this->set('_serialize', array('rental'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $state_id = 14;

		if ($this->request->is('post')) {
            $state_id = $this->request->data['Rental']['state_id'];

			$this->Rental->create();
			if ($this->Rental->save($this->request->data)) {
				$this->Flash->set(__('The rental has been saved.'), array('element' => 'SemanticFlash-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set(__('The rental could not be saved. Please, try again.'), array('element' => 'SemanticFlash-alert'));
			}
		}

        $cities = $this->Rental->City->find('list', array('conditions' => array('state_id' => $state_id)));
        $owners = $this->Rental->Owner->find('list');
        $this->set(compact('owners', 'cities', 'rental'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Rental->exists($id)) {
			throw new NotFoundException(__('Invalid rental'));
		}

        $rental = null;
		if ($this->request->is(array('post', 'put'))) {
            $rental = $this->request->data;

			if ($this->Rental->save($this->request->data)) {
				$this->Flash->set(__('The rental has been saved.'), array('element' => 'SemanticFlash-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set(__('The rental could not be saved. Please, try again.'), array('element' => 'SemanticFlash-alert'));
			}
		} else {
			$options = array('conditions' => array('Rental.' . $this->Rental->primaryKey => $id));
			$rental = $this->request->data = $this->Rental->find('first', $options);
		}

        $cities = $this->Rental->City->find('list', array('conditions' => array('state_id' => $rental['Rental']['state_id'])));
		$owners = $this->Rental->Owner->find('list');
		$this->set(compact('owners', 'cities', 'rental'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Rental->id = $id;
		if (!$this->Rental->exists()) {
			throw new NotFoundException(__('Invalid rental'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Rental->delete()) {
			$this->Flash->set(__('The rental has been deleted.'), array('element' => 'SemanticFlash-success'));
		} else {
			$this->Flash->set(__('The rental could not be deleted. Please, try again.'), array('element' => 'SemanticFlash-warning'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
