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

    public function html5(){
        echo $this::DOCTYPE;
    }

    public function exec(callable $function, ...$args){
        return call_user_func_array($function, $args);
    }

    public function make($name, $function, $args){

    }

    public function children(array $children){
        return implode("", $children);
    }

    public function __call($name, $arguments)
    {

        $attributes = [];
        $children = "";
        $attr = "";
        $return = true;

        foreach($arguments as $key => $value){

            if(!is_numeric($key)){

                if($key == 'print'){
                    $return = !$value;
                    continue;
                }

                if($key == 'children') {
                    $children .= $this->children($value);
                    continue;
                }

                $attr .= " \"$key\"=\"$value\"";
                continue;
            }

            $children .= $value;
        }

        $openTag = "<$name$attr";
        $closingTag = "</$name>";
       
        if(empty($children)){
            $closingTag = "";
            $openTag .= "/>";
        }
        else {
            $openTag .= ">";
            $closingTag = "</$name>";
        }
        $output = "$openTag$children$closingTag";

        if($return) return $output;

        echo "$openTag$children$closingTag";

    }
    
}
?>