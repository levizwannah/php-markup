<?php

use LeviZwannah\PhpMarkup\Facades\Markup as h;

require(__DIR__."/vendor/autoload.php");
require(__DIR__. "/components/blog.php");

$v = "Hey There. This is a test";
$blogArray = ["Hello There", "This is blog 2", "This is blog 3"];

h::html5();

h::html(
    
    h::head(

        h::meta(
            charset: "utf8"
        ),

        h::meta(
            http_equiv : "X-UA-Compatible",
            content : "IE=edge"
        ),

        h::meta(
            name : "viewport",
            content : "width=device-with, initial-scale=1.0"
        ),

        h::link(
            rel : "stylesheet",
            href : "https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css",
            integrity : "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T",
            crossorigin : "anonymous"
        ),

        h::title("Document"),
    ),

    h::body(
        class: "body-class",
        children: [

            h::div(
                class : "container card m-3 shadow-sm p-3 w-full",

                children: [
                    h::p(
                        "Hello World from Paragraph 1",
                        id : "p1",
                    ),
    
                    h::div(
                        h::p(
                            h::b("This is bold"),
                            "Text from another paragraph",
                            h::i("This text is italic"),
                            "Another Paragraph text here"
                        )
                    ),
                ]
            ),

            h::div(
                class : "container card m-3 w-full",
                exec: function() use ($v) {
                    $output = "";

                    foreach([1, 2, 3, 4] as $num){
                        $output .= h::p("Paragraph number $num", class: 'text-dark');
                    }

                    return $output;
                },

                children: [
                    h::blog(
                        h::h1("Hello There"),
                        class: 'p-4 m-2',
                        content: $blogArray
                    )
                ] 
            ),

            h::div(
                class : "container card m-3",

                children: [
                    h::div(
                        class : "d-flex justify-content-between w-100 p-3",

                        children: [
                            h::button(
                                type : "button",
                                class : "btn btn-outline-danger",
                                text: "Click Me",
                                onclick: 'btn1()'
                            ),
        
                            h::button(
                                type : "button",
                                class : "btn btn-outline-success",
                                text: "Click Me 2",
                                onclick: 'btn2()'
                            )
                        ]
                    )
                ]
                
            ),
        
            h::footer(
                h::script(
                    src : "https://code.jquery.com/jquery-3.3.1.slim.min.js",
                    integrity : "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo",
                    crossorigin : "anonymous",
                    close: true
                ),
                h::script(
                    src : "https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js",
                    integrity : "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1",
                    crossorigin : "anonymous",
                    close: true
                ),
                h::script(
                    src : "https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js",
                    integrity : "sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM",
                    crossorigin : "anonymous",
                    close: true
                ),
                h::script(
                    '
                    function btn1(){
                        console.log("btn 1 clicked");
                    }
        
                    function btn2(){
                        console.log("btn 2 clicked");
                    }
                    '
                )
            )
        ]
    ),

    print: true
);

?>