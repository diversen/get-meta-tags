<?php

include_once "../autoload.php";
use diversen\meta;

$m = new meta();

return;
// Simple usage, get's title, description, and keywords by default
$ary = $m->getMeta('https://github.com/diversen/get-meta-tags');
print_r($ary);

// With more params
$ary = $m->getMeta('https://github.com/diversen/get-meta-tags', array ('description' ,'keywords'), $timeout = 10);
print_r($ary);