# get-meta-tags

Get meta tags using curl and DOM

## Install

    composer require diversen/get-meta-tags

## Usage: 

~~~php

use diversen\meta;

$m = new new meta();
$ary = $m->getMeta('https://github.com/diversen/get-meta-tags', array ('description' ,'keywords', $timeout = 10);

print_r($ary);


