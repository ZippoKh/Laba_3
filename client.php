<?php
require 'connection.php';
header('Content-Type: application/json');  // <-- header declaration
$clientName = $_GET['client'];


$cursor = $db->users->findOne(['surname'=>$clientName],['projection'=>['messages'=>1,'_id'=>0]]);
$out = iterator_to_array($cursor);
echo json_encode($out);
