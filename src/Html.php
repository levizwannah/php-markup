<?php 
namespace LeviZwannah\Php2html;

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

    /**
     * Sets and gets the built string
     * @param string $string
     * 
     */
    private function __($string = ""){
        if(empty($string)) return $this->__;

        $this->__ = $string;

        return $this;
    }

    /**
     * Puts a text between HTML elements
     * @param mixed $string
     * 
     */
    public function __text($string){
        
        $this->__(
            $this->__() . $this->last . $string
        );

        $this->last = "";

        return $this;
    }

    /**
     * Puts a <!DOCTYPE html> in the file
     * @return string
     */
    public function __html5(){
        return $this->__(
            $this::DOCTYPE . $this->__()
        );
    }

    /**
     * Allows PHP code to run between markup generation.
     */
    public function __pause(){
        return $this->__end(false);
    }
    /**
     * Prints the created html
     * @return static
     */
    public function __end($closeAll = true){

        $output = $this->__();
        $this->__ = "";

        if($closeAll){
            while($elem = array_pop($this->elements)){
                $output .= $this->last . "</$elem>";
                $this->last = "";
            }
        }
        
        echo $output;

        return $this;
    }

    public function __call($name, $arguments)
    {

        if($name[0] == "_"){

            $attrName = substr($name, 1);
            $attrName = preg_replace("/_/", "-", $attrName);

            if($attrName[0] == "-") $attrName = "_" . substr($attrName, 1);

            if(empty($arguments)) $arguments = [];

            $values = implode(" ", $arguments);

            if($this->last == ">"){
                $this->__(
                    $this->__() . " $attrName=\"$values\""
                );
            }

            $this->last = ">";

            return $this;
        }

        $this->__($this->__() . $this->last);

        if(!empty($arguments) && is_numeric($arguments[0])){

            $elem = array_pop($this->elements);
            $this->__($this->__() . "</$elem>");
            $this->last = "";

            return $this;
        }

        if(!empty($arguments)){
            throw new RuntimeException("Expected numberic argument for closing tags");
        }

        array_push($this->elements, $name);
        $this->__($this->__() . "<$name");
        $this->last = ">";
        return $this;
    }

    
}
?>