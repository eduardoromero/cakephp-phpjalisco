<?php
$this->layout = 'json';

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