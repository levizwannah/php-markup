# PHP-Markup
PHP-Markup is a library that allows you to elegantly write html markup with PHP. The library allows you to make component, composite elements, and even overwrite the default html tag. Imagine if you want every `p` element to have some default class, you can overwrite the normal `p` element using this library to save you much of the work, keeping things clean and elegant.

# Usage
You can use this library to write a whole markup or put HTML markup within PHP code without opening and closing the PHP tags.

# Syntax
Use the `Markup` Facade which is located in `LeviZwannah\PhpMarkup\Facades` for elegant writing.

```php
<?php

use LeviZwannah\PhpMarkup\Facades\Markup as pm;

pm::div(
    class: 'mb-2',
    id: 'div-id'
    children: [
        pm::p('This is a paragraph a child of div')
    ],
    print: true
);

?> 
```  

## HTML Attributes
HTML attributes can be added using the named parameter feature of PHP. For example, you can see the `id` field in the above demonstration.

### HTML Attributes with dash(-)
For attributes that contains dash(-) in their names, replace all dashes with underscores(_). For example, `http-equiv="X-UA-Compatible"` will be `http_equiv: "X-UA-Compatible"` 

### Child Elements
If you put the children elements before the attributes, then you don't have to put the children element in the `children` array. However, if the children element come after the attributes, then you must put them in the `children` array. For example,

**Children Before Attributes**
```php
<?php

use LeviZwannah\PhpMarkup\Facades\Markup as pm;

pm::div(
    pm::p('This is a paragraph a child of div'), // child first,
    pm::div(
        'Inner Text for div',
        pm::span('A span elem')
    ),
    class: 'mb-2', // then attributes
    id: 'div-id'
    print: true
);

?> 
```

**Children After An Attribute**
```php
<?php

use LeviZwannah\PhpMarkup\Facades\Markup as pm;

pm::div(
    class: 'mb-2', // then attributes
    id: 'div-id',
    children: [
        pm::p('This is a paragraph a child of div'), // child first,
        pm::div(
            'Inner Text for div',
            pm::span('A span elem')
        ),
    ]
    print: true
);

?> 
```

## HTML Elements
The library is agnostic to html elements, only defining few functions that cannot be made HTML elements. Everything you write is taken as a markup element. For example, `pm::random(id: '1')` will create an element `<random id='1' />`. Therefore, you can do wonders here. However, few functions won't return elements. They are as follows:
1. component -- makes a component
2. removeComponent -- remove a component
3. children -- parses children
4. exec -- executes a function
5. handle -- the underlying function that creates tags

## Self-Closing tags
Tags without children or text in-between their opening and closing tag are self-closing automatically.
> Note: The library is agnostic to html elements, so if you know a tag should close but has no children, inform the markup engine through the `closing: true` parameter. For example, `script` tags that do not have inner code (but have src).

## Special Parameters
1. `close` - a boolean attribute that tells the library to create a closing tag for the current element. ***The Library will automatically make elements with no inner html self-closing***. This behavior is not good for elements like `script` which could not have any inner content. Hence, to force close an empty element, pass the `close: true` parameter to the element.
2. `text{number}` - the value of this parameter will be consider as an inner text of the element. ***Please note that the position of this parameter will be respected when making the inner html of the created element.*** for example, `pm::div(id: 'div-1', text: 'hello div')`; However, you don't need to use the `text` parameter. You can just pass the string value and it will be considered as an inner content of the div. for example `pm:div(id: 'div-1', "hello div")`.
3. `print` - this is a boolean parameter that tells the engine to print out the content of this tag. By default, it will be returned. So, you should put the print in the most outer tag of your markup. For example, the `html` tag. See below,
```php
pm::html(
    ...$args,
    print: true
);
```
4. `exec{number}` - the value of this attribute is a function that must return a string. the exec function tells the underlying engine to execute this function and put it's content as in inner html of the current div. The `{number}` represents a count of the functions to execute. This is because you may want to execute multiple functions during an element creation. Hence, you can have `exec`, `exec1`, `exec2`, ..., `execN`, in an element. ***Note that the position of the function will match the position at which it's content will be placed in the inner html of the current element.***
5. `children{number}` - this is an array of inner html. Every element in the children array should not pass the `print` parameter, else they will be printed before the element gets created. The `{number}` allows you to have multiple `children` parameters during an element creation. for example, you can have `children`, `children1`, `children2`, ... , `childrenN`. ***Remember this is an array of inner html. So don't think you need to have children1, children2, etc, you can only use one and pass all your inner html elements.***. Another thing to note is that, the position of elements in the `children` array is followed when adding the inner elements to the created element. Example
```html
<div class='div' id='div-1'>
    <p id='p-1' class='p-class'>This is the first Paragraph</p>
    This is some text
    <p id='p-2' class='p-class'>This is the second paragraph</p>

    ... some function executes here then...

    <p id='p-3' class='p-class'> This is the third paragraph</p>
    <span id='span-1'>This is a span</p>
</div>

```
**is equivalent to**
```php 
pm::div(
    id: 'div-1',
    class: 'div',
    children1: [
        pm::p(
            id: 'p-1'
            class: 'p-class',
            text: 'This is the first paragraph'
        ),
        "This is some text", // position is observed
        pm::p(
            id: 'p-2',
            class: 'p-class',
            text: 'This is the second paragraph'
        )
    ],
    exec1: function(){
        return '... Some function executes here then...'
    },
    children2: [
        pm::p(
            id: 'p-3',
            class: 'p-class',
            text: 'This is the third paragraph'
        ),
        pm::span(
            id: 'span-1',
            text: 'This is a span'
        )
    ],

    print: true // print out this div
);
```

## Components
With the `make` function, it is easier to make your own component. This function allows you to make a component or overwrite the default behavior of normal html elements.
*definition:*
```php
component(string $name, \Closure $render, array $specialArgs = []): self
```
1. `name: string` - the unique name of the element. For example `mainNav`, or `blogList`, etc.
2. `render: \Closure -- returns string` - the function to execute when this component is called. For example, `pm::blogList(...$args)`. This function takes two arguments. The first is an array of special arguments as specified by `specialArgs` params. The second parameter is an array of the remaining arguments. e.g, class, id, children, etc.
3. `specialArgs: array` - the names of special arguments that the function needs to execute some special logic. When the component is being created, the engine will extract the special params and pass it to the `do` function. For example, if the `blogList` component expects an array called blogs, then when this component will be called like this,
```php
pm::blogList(
    class: 'some-class'
    blogs: $array,
    data_name: 'some data attribute'
)
```
In the above case, the `specialArgs` will be `['blogs']`. Hence when the `blogList` is called, we will call, render(`['blogs' => $array]`, `['class' => 'some-class', 'data-name' => 'some data attribute']`). 

### Making your own components
To keep your components organized, put them in separate files, or in a single one, in a specific folder. Even better, you can put them in a class and use autoload to load them when necessary.  

In this example, a structural approach is taken to demonstrate creating a component.

### creating the component
```php
# blog.php
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
```
### using the component
```php
# index.php
h::div(
    class : "container card m-3 w-full",
  
    # ...

    children: [
        h::blog(
            h::h1("Hello There"),
            class: 'p-4 m-2',
            content: $blogArray
        )
    ] 
),
```

### output 
>(remember this uses bootstrap for styling)
```html
<div class="p-4 m-2">
    This is a div for Hello There
    <h1>Hello There</h1>
</div>
<div class="p-4 m-2">
    This is a div for This is blog 2
    <h1>Hello There</h1>
</div>
<div class="p-4 m-2">
    This is a div for This is blog 3
    <h1>Hello There</h1>
</div>
```

# Overwriting Normal HTML Tags
Firstly, this library is markup agnostic. That means, whatsoever you call will be considered as a markup. For example,
```php
h::you(
    class: 'you-class',
    id: 'you-1',
    text: 'Hello you'
);
```
will produce an output
```html
<you class="you-class" id="you-1">Hello you</you>
```  

The main benefit of this is that you can define any html element to behave the way you want. The main logic under this is the `handle` method which does the actual rendering. 
> When redefining the behavior of an element, do not call the element as a function in its own definition, this can result in an infinite recursion.

*Definition of the handle function*
```php
/**
 * @param string $name - The name of the element
 * @param array $args - The list of arguments passed to the function
 * during creation. For example pm::div(...args)
 * @param bool $return - should the created string be printed or
 * returned?
 */
handle(string $name, array $args, bool $return = true)
```

**Redefining the `<p>` element**
```php
# custom-tags.php
use LeviZwannah\PhpMarkup\Facades\Markup as pm;

pm::component(
    name: "p",
    render: function($mainArgs, $args){
        # add more classes to p
        $classes = $args['class'] ?? "";
        $classes = "custom-p-class $classes custom-p-class-2";
        $args['class'] = $classes;

        # you could even put the p in a div by default.

        return pm::handle('p', $args);
    },
    specialArgs: []
);
```

**Whenevery `pm::p(...)` is called, your custom definition will be the default behavior of the `p` tag**.


# Installation
From Composer
`composer require levizwannah/php-markup`

# Finally,
You will like this! But the `Html` object is a singleton🏃‍♂️🏃‍♂️ for memory sake.


