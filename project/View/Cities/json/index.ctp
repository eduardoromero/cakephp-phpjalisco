<?php
$response = [
    'count'        => count($cities),
    'cities'       => $cities,
    'page_current' => $this->Paginator->current(),
    'page_count'   => (int)$this->Paginator->counter('{:pages}'),
];


echo json_encode($response);