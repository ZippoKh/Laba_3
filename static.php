<?php
require 'connection.php';
header('Content-Type: application/json');  // <-- header declaration

$cursor = $db->sessions->find([],['projection'=>['traffic_in'=>1,'traffic_out'=>1,'_id'=>0]]);
$out = iterator_to_array($cursor);

$output = array(
    'traffic_in' => 0.0,
    'traffic_out' => 0.0
);

foreach ($out as $value) {
    $output['traffic_in'] += $value['traffic_in'];
    $output['traffic_out'] += $value['traffic_out'];
}

echo json_encode($output);
