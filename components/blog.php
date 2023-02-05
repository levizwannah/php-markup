<?php

use LeviZwannah\PhpMarkup\Facades\Markup as pm;

pm::component(
    name: "blog",
    render: function($mainArgs, $args){
        $output = "";

        $content = $mainArgs['content'];

        foreach($content as $blog){
            $output .= pm::div(
                "This is a div for $blog",
                ...$args
            );
        }

        return $output;
    },
    specialArgs: ['content']
);


?>