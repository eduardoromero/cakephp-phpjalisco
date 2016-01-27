<?php
$response = [
    'count'        => count($cities),
    'cities'       => $cities,
    'autocomplete' => $autocomplete,
    'state'        => $config['lists']['states'][$state_id],
    'state_id'     => $state_id,
];

echo json_encode($response);