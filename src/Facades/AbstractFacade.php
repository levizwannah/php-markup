<?php
namespace LeviZwannah\PhpMarkup\Facades;


abstract class AbstractFacade{

    /**
     * Contains loaded instances
     * @var array
     */
    public static $instances = [];

    /**
     * Gets the underlying type
     * @return string
     */
    abstract public static function accessor();

    public static function __callStatic($name, $arguments)
    {
        $class = static::accessor();


        if(!isset(self::$instances[$class])){
            self::$instances[$class] = new $class();
        }

        $instance = self::$instances[$class];

        return $instance->$name(...$arguments);
    }
}

?>