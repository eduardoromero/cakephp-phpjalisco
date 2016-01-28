<?php
App::uses('AppModel', 'Model');
/**
 * Rating Model
 *
 * @property Rental $Rental
 */
class Rating extends AppModel {

	public function afterSave($created, $options = array()) {
        /* update this Rental's average raiting */
        $this->update_average_rating($this->data['Rating']['rental_id']);
    }

    public function update_average_rating($rental_id) {
        $ratings = $this->find('list', ['conditions' => ['rental_id' => $rental_id]]);
        $avg_rating = 0;

        if($ratings) {
            $avg_rating = ceil(array_sum($ratings) / count($ratings));
        }

        $this->Rental->id = $rental_id;
        $this->Rental->saveField('average_rating', $avg_rating);
    }

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'rating';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'rating' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Rental' => array(
			'className' => 'Rental',
			'foreignKey' => 'rental_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
