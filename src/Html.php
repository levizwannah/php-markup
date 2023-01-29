<?php 
namespace LeviZwannah\PhpMarkup;

use Closure;

/**
 * Outputs an HTML string
 */
class Html{

    protected $components = [];

    const DOCTYPE = "<!DOCTYPE html>";

    public function __construct(){}

    public function html5(){
        echo $this::DOCTYPE;
    }

    public function exec(callable $function, ...$args){
        return call_user_func_array($function, $args);
    }

    public function make($name, $do, $specialArgs = []){
        $this->components[$name] = ['do' => $do, 'specialArgs' => $specialArgs];
        return $this;
    }

    public function removeComponent($name){
        unset($this->components[$name]);
        return $this;
    }

    public function children(array $children){
        return implode("", $children);
    }

    public function __call($name, $arguments)
    {

        $return = true;

        if(isset($arguments['print'])) {
            $return = !$arguments['print'];
            unset($arguments['print']);
        }

        /**
         * If we have this component registered, then we will pass
         * the arguments to it instead of processing it ourself;
         */

        if(isset($this->components[$name])){
            $specialArgs = $this->components[$name]['specialArgs'];
            $special = [];

            foreach($specialArgs as $a){
                $special[$a] = $arguments[$a];
                unset($arguments[$a]);
            }

            if($return) return $this->components[$name]['do']($special, $arguments);
            echo $this->components[$name]['do']($special, $arguments);
            return;
        }

        return $this->handle($name, $arguments, $return);

    }

    public function handle($name, $arguments, $return = true){

        $children = "";
        $attr = "";
        $close = false;
       
        foreach($arguments as $key => $value){

            if(!is_numeric($key)){

                if($key == 'children' || preg_match("/^children\d*/", $key)) {
                    $children .= $this->children($value);
                    continue;
                }

                if($key == 'text' || preg_match("/^text\d*/", $key)) {
                    $children .= $value;
                    continue;
                }

                if($key == 'close'){
                    $close = $value;
                    continue;
                }

                if($value instanceof Closure || is_callable($value)){
                    $children .= $this->exec($value);
                    continue;
                }

                $key = str_replace("_", "-", $key);
                $attr .= " $key=\"$value\"";
                continue;
            }

            if(is_array($value)){
                print_r($value);
                continue;
            }
            $children .= $value;
        }

        $openTag = "<$name$attr";
        $closingTag = "</$name>";
       
        if(empty($children) && !$close){
            $closingTag = "";
            $openTag .= "/>";
        }
        else {
            $openTag .= ">";
            $closingTag = "</$name>";
        }

        $output = "$openTag$children$closingTag";

        if($return) return $output;

        echo $output;
    }
    
}
?>