<?php
defined('BASE_PATH') OR exit('Access not allowed');

require_once BASE_PATH . 'Constants.php';

if (! function_exists('loadClass')) {
    /**
     * Class registry
     *
     * This function acts as a singleton. If the requested class does not
     * exist it is instantiated and set to a static variable. If it has
     * previously been instantiated the variable is returned.
     *
     * @param	string	the class name being requested
     * @param	string	the directory where the class should be found
     * @param	string	an optional argument to pass to the class constructor
     * @return	object
     */
    function & loadClass($class, $param = NULL, $inDir = '')
    {
        static $_classes = array();

        // 类已被实例化过
        if (isset($_classes[$class])) {
            return $_classes[$class];
        }

        if (false === class_exists($name, false) && file_exists($inDir.'/'.$class.'.php')) {
            require_once($inDir.'/'.$class.'.php');
        }

        if (! class_exists($name, false)) {
            throw new Exception('Can not load the specified class: ' . $class, Constants::ERROR_LOAD_CLASS_FAIL);
            return null;
        }

        // Keep track of what we just loaded
        isLoaded($class);

        $_classes[$class] = isset($param) ? new $name($param) : new $name();

        return $_classes[$class];
    }
}
/* EOF */