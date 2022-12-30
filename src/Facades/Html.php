<?php 
namespace LeviZwannah\Php2html\Facades;

use LeviZwannah\Php2html\Html as Php2htmlHtml;

/**
 * The Html Facade. Mainly use this as H, to reduce the writing
 * @method static Html __text(string $string)
 * @method static Html __html5()
 * @method static Html __pause()
 * @method static Html __end()
 * @method static Html _<attr>(string $attributeValue)
 * @method static Html <elem>()
 * @method static Html <elem>(int $close = 1) 
 */
class Html extends AbstractFacade{
    
   
    public static function accessor()
    {
        return Php2htmlHtml::class;
    }
}
?>