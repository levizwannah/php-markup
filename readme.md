# PHP2HTML
Php2html is a library that converts your php code to HTML. You don't need to close and open php tags anymore to write html. The library is expressive and supports every HTML component, tags, and attributes... and even your own elements as long as you follow the rules.

# Usage
You can use this to embed html markup in a php file (among other html markups) or just write the whole markup using the library as shown in `example.php`.

# Syntax
Use the `Html` Facade which is located in `LeviZwannah\Php2html\Facades` for elegant writing.

```
<?php

use LeviZwannah\Php2html\Facades\Html as H;

H::div()
    ::p()::_id("p1")
        ::__text("Hello PHP2HTML From Paragraph")
        ::b()::__text("A Bold Text")::b(1)
    ::p(1)
::div(1)

::__end();

?> 
```
> Note: functions with double underscores `__` belong to the `php2html` library.  

## HTML Attributes
Use underscore(`_`) before the name of the function to tell the library
that it is an attribute. The argument passed to the function is the attribute's value. For example, `_id("p1")` generates `id="p1"`.
> Note: Everything is possible. `_data_phone("num")` will generate an attribute `data-phone="num"`. You can write anything, and it will be converted to markup. The library makes no presumptions of what you will write.

### HTML Attributes with dash(-)
For attributes that contains dash(-) in their names, replace all dashes with underscores(_). For example, `http-equiv="X-UA-Compatible"` will be `::_http_equiv("X-UA-Compatible")` 

## HTML Element
Any name without an `_` will be treated as an HTML element. This means, you can even create your own HTML elements. There is no limit. For example 
`::random()::_id("random1")::__text("A Text here")::random(1);` will generate an html markup: `<random id="random1">A Text here</random>`.  

To close a previously opened tag, pass 1 as the argument to the open tag's function. For example, `::p()::text("Hello")::p(1)`. Notice the `::p(1)`.

## The __text() Function
Use this function to put text/markup/code/string between opening and closing tags.

## The __html5() Function
Adds the famous `<!DOCTYPE html>` to your markup.

## The __end() function
Prints the html markup and empties the buffer. All unclosed HTML tags will be closed.
> Warning: Call this at the end of the file. Otherwise, use __pause() if you want to run a php code in between markup generation.

## The __pause() function
Prints out the current generated markup without closing opened tags. This allows you to run a php code in between markup generation. For example,
```
...
::div()::_class("container", "card", "m-3") // opens div
    ::__pause(); // prints the current markup

    foreach([1, 2, 3, 4, 5] as $num){
        H::p()::_id("random-$num")
            ::__text("Random Text Here Number $num ")
        ::p(1)
        ::__pause(); //prints the current markup
    }

H::div(1) // closes div
...
...

H::end(); // prints all the remaining markups and closes open tags.
```

## Self-Closing tags
Just follow the formats of opening and closing elements. If there is no inner text in the, the library will handle self-closing tags.


# Installation
From Composer
`composer require levizwannah/php2html`

# Finally,
You will like this! But the `Html` object is a singleton🏃‍♂️🏃‍♂️ for memory sake.


