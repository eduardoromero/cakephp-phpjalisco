<?php
$this->layout = 'json';
$success = $rental ? true : false;

/* add formating icing */
if($success) {
    $rental['Rental']['title'] = h($this->Text->truncate($rental['Rental']['title'], 24));
    $rental['Rental']['fee'] = $this->Number->currency($rental['Rental']['fee']);
    $rental['Rental']['domicilio'] = nl2br($rental['Rental']['domicilio']);
    $rental['Rental']['rating'] = $this->element('rating', array(
        'review_rating'      => $rental['Rental']['average_rating'],
        'review_rating_star' => 'star',
    ));
}

$response = [
    'rental'    => $rental,
    'success'    => $success,
];


echo json_encode($response);