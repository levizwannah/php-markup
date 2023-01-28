<?php

use LeviZwannah\PhpMarkup\Facades\Markup as pm;
require(__DIR__ . '/vendor/autoload.php');

require(__DIR__ . '/components/blog.php');

pm::html5();

pm::html(
    id: 'name',
    class: 'test1 and test 2',
    print: true,
    children: [
        "Hello world",
        pm::br(),
    ]
);

?>