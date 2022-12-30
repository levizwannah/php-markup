<?php 
namespace LeviZwannah\Php2html\Support\Facades;

use LeviZwannah\Php2html\Html as Php2htmlHtml;

class Html extends AbstractFacade{
    
    public static function accessor()
    {
        return Php2htmlHtml::class;
    }
}
?>