<?php

$cursor = $db->users->find([],['projection'=>['surname' => 1, '_id' => 0]]);
$out = iterator_to_array($cursor);
