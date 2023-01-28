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

**Children First**
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

**Children last**
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
1. make -- makes a component
2. removeComponent -- remove a component
3. children -- parses children
4. exec -- executes a function



## Self-Closing tags
Tags without children or text in-between their opening and closing tag are self-closing automatically.
> Note: The library is agnostic to html elements, so if you know a tag should close but has no children, inform the markup engine through the `closing: true` parameter. For example, `script` tags that do not have inner code (but have src).


# Installation
From Composer
`composer require levizwannah/php-markup`

# Finally,
You will like this! But the `Html` object is a singleton🏃‍♂️🏃‍♂️ for memory sake.


