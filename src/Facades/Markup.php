<?php 
namespace LeviZwannah\PhpMarkup\Facades;

use LeviZwannah\PhpMarkup\Html;

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
class Markup extends AbstractFacade{
    
   
    public static function accessor()
    {
        return Html::class;
    }
}
?>