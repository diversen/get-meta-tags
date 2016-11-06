# get-meta-tags

PHP composer package for getting title and meta-tags
Get meta tags using curl and DOM

## Install

    composer require diversen/get-meta-tags

## Usage: 

~~~php

// include_once "../../vendor/autoload.php";
use diversen\meta;

$m = new meta();

// Simple usage, get's title, description, and keywords by default
$ary = $m->getMeta('https://github.com/diversen/get-meta-tags');
print_r($ary);

// With more params
$ary = $m->getMeta('https://github.com/diversen/get-meta-tags', array ('description' ,'keywords'), $timeout = 10);
print_r($ary);
~~~

## License

MIT © [Dennis Iversen](https://github.com/diversen)
