<?php 
namespace LeviZwannah\PhpMarkup;

use RuntimeException;

/**
 * Outputs an HTML string
 */
class Html{

    /**
     * Elements stack
     * @var array
     */
    private $elements = [];

    /**
     * Last string to close an open tag for efficiency reasons
     * @var string
     */
    private $last = "";

    /**
     * The built html string
     * @var string
     */
    private $__ = "";

    const DOCTYPE = "<!DOCTYPE html>";

    public function __construct(){}

    public function text(string $text){
        return $text;
    }

    public function exec(callable $function, ...$args){
        return call_user_func_array($function, $args);
    }

    public function make($name, $function, $args){

    }

    public function children(array $children){
        
    }

    public function __call($name, $arguments)
    {
        print_r($arguments);
    }
    
}
?>