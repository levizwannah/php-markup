<?php
require (__DIR__ . "/vendor/autoload.php");

use LeviZwannah\Php2html\Facades\Html as H;

H::__html5() // echo <!DOCTYPE html>

::html()::_lang("en")

::head()
    ::meta()::_charset("UTF-8")::meta(1)
    ::meta()::_http_equiv("X-UA-Compatible")::_content("IE=edge")::meta(1)
    ::meta()
        ::_name("viewport")::_content("width=device-width, initial-scale=1.0")
    ::meta(1)
    ::link()
        ::_rel("stylesheet")
        ::_href("https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css")
        ::_integrity("sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T")
        ::_crossorigin("anonymous")
        ::link(1)
    ::title()::__text("Document")::title(1)
::head(1)

::body()

    ::div()::_class("container card m-3 shadow-sm p-3 w-full")
        ::p()::_id("p1")
            ::__text("Hello World from Paragraph1")
        ::p(1)
        ::div()
            ::p()
                ::b()::__text("This is bold")::b(1)
                ::__text(" From another text ")
                ::i()::__text("This is italic")::i(1)
                ::__text(" Another Text In here")
            ::p(1)
        ::div(1)
    ::div(1)

    ::div()::_class("container", "card", "m-3", "w-full")
    ::__pause(); // pauses

    foreach([1, 2, 3, 4, 5] as $num){
        H::p()::_id("random1")
            ::__text("Random Text Here Number $num ")
        ::p(1)
        ::__pause(); //pauses
    }

    H::div(1)

    // handling buttons
    ::div()::_class("container card m-3")
        ::div()::_class("d-flex justify-content-between w-100 p-3")

            ::button()::_type("button")::_onclick("btn1()")
            ::_class("btn btn-outline-danger")
            ::__text("Click Me 1")
            ::button(1)

            ::button()::_type("button")::_onclick("btn2()")
            ::_class("btn btn-outline-success")
            ::__text("Click Me 2")
            ::button(1)

        ::div(1)
    ::div(1)

    ::footer()
        ::script()
            ::_src("https://code.jquery.com/jquery-3.3.1.slim.min.js")
            ::_integrity("sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo")
            ::_crossorigin("anonymous")
        ::script(1)

        ::__text('
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        ') // you could use this, or script tag as shown below

        ::script()
            // you could write this in an external script file
            // or even here, but close the php tags!
            // here it is in plain text... beware of injections if you
            // use the below approach
            ::__text('
            function btn1(){
                console.log("btn 1 clicked");
            }

            function btn2(){
                console.log("btn 2 clicked");
            }
            ')
        ::script(1)
    ::footer(1)

::body(1)
::html(1)

::__end(); // finish
?>    

