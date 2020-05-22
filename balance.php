<?php
require 'connection.php';
header('Content-Type: application/json');  // <-- header declaration

$cursor = $db->users->find(['balance'=>['$lt'=>0]],['projection'=>['_id'=>0,'messages'=>0]]);
$out = iterator_to_array($cursor);


echo json_encode($out);
