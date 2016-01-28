<?php
$this->layout = 'json';
/* add formating icing */
foreach ($rentals as &$rental) {
    $rental['Rental']['title'] = h($this->Text->truncate($rental['Rental']['title'], 24));
    $rental['Rental']['fee'] = $this->Number->currency($rental['Rental']['fee']);
    $rental['Rental']['domicilio'] = nl2br($rental['Rental']['domicilio']);
    $rental['Rental']['rating'] = $this->element('rating', array(
        'review_rating'      => $rental['Rental']['average_rating'],
        'review_rating_star' => 'star',
    ));
}


$success = $this->Paginator->params()['count'] ? true : false;
$response = [
    'rentals'    => $rentals,
    'pagination' => array(
        'total'        => $this->Paginator->params()['count'],
        'page_count'   => $this->Paginator->params()['pageCount'],
        'current_page' => $this->Paginator->params()['page'],
        'numbers'      => strip_tags($this->Paginator->numbers(array('separator' => '|', 'modulus' => 4, 'class' => false, 'currentTag' => '', 'currentClass' => '', 'tag' => false))),
    ),
    'success'    => $success,
];


echo json_encode($response);