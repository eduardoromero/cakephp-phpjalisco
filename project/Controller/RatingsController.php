<?php
App::uses('AppController', 'Controller');

/**
 * Ratings Controller
 *
 * @property Rating $Rating
 * @property PaginatorComponent $Paginator
 */
class RatingsController extends AppController {

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
        $this->Rating->recursive = 0;
        $this->set('ratings', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Rating->exists($id)) {
            throw new NotFoundException(__('Invalid rating'));
        }
        $options = array('conditions' => array('Rating.' . $this->Rating->primaryKey => $id));
        $this->set('rating', $this->Rating->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Rating->create();
            if ($this->Rating->save($this->request->data)) {
                $this->Flash->set(__('The rating has been saved.'), array('element' => 'SemanticFlash-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set(__('The rating could not be saved. Please, try again.'), array('element' => 'SemanticFlash-alert'));
            }
        }
        $rentals = $this->Rating->Rental->find('list');
        $this->set(compact('rentals'));
    }

    public function post($id = null) {
        if ($id && !$this->Rating->exists($id)) {
            throw new NotFoundException(__('Invalid id'));
        }

        $this->request->allowMethod('post', 'put', 'get');
        $rating     = [];
        $response   = [
            'success'   => false,
            'errors'    => [],
        ];

        if ($this->request->is('ajax') || $this->request->is('json')) {
            $is_ws = true;

            $data = $this->request->input('json_decode');
        }

        if(!empty($this->request->data)) {
            if ($this->Rating->save($this->request->data)) {
                $rating = $this->Rating->read();

                if($is_ws) {
                    $response['success'] = true;
                    $response['rating']  = $rating;
                } else {
                    $this->Flash->set(__('The rating has been saved.'), array('element' => 'SemanticFlash-success'));
                    return $this->redirect(array('action' => 'index'));
                }
            } else {
                if($is_ws) {
                    $this->response->statusCode(400);
                    $response['errors'] = $this->Rating->invalidFields();
                } else {
                    $this->Flash->set(__('The rating could not be saved. Please, try again.'), array('element' => 'SemanticFlash-alert'));
                }

            }
        } else {
            if($id) {
                $this->request->data = $this->Rating->read(null, $id);
            } else {
                $this->request->data = $this->Rating->blank();
            }

        }


        $this->set('rating',    $rating);
        $this->set('rentals',   $this->Rating->Rental->find('list'));
        $this->set('response',  $response);

        $this->set('_serialize', array('response'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Rating->exists($id)) {
            throw new NotFoundException(__('Invalid rating'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Rating->save($this->request->data)) {
                $this->Flash->set(__('The rating has been saved.'), array('element' => 'SemanticFlash-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set(__('The rating could not be saved. Please, try again.'), array('element' => 'SemanticFlash-alert'));
            }
        } else {
            $options = array('conditions' => array('Rating.' . $this->Rating->primaryKey => $id));
            $this->request->data = $this->Rating->find('first', $options);
        }
        $rentals = $this->Rating->Rental->find('list');
        $this->set(compact('rentals'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Rating->id = $id;
        if (!$this->Rating->exists()) {
            throw new NotFoundException(__('Invalid rating'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Rating->delete()) {
            $this->Flash->set(__('The rating has been deleted.'), array('element' => 'SemanticFlash-success'));
        } else {
            $this->Flash->set(__('The rating could not be deleted. Please, try again.'), array('element' => 'SemanticFlash-warning'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}