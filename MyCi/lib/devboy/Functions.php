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
    function & loadClass($class, $inDir = '', $param = NULL)
    {
        static $_classes = array();
        
        $class = str_replace('.', '_', $class);

        // 类已被实例化过
        if (isset($_classes[$class])) {
            return $_classes[$class];
        }
        if ('' != $inDir) {
        	$inDir = trim($inDir, DS) . DS;
        }

        $classFile = $inDir . preg_replace('/_+/', DS, $class).'.php';

        if (false === class_exists($name, false) && file_exists($classFile)) {
            require_once($classFile);
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

if (! function_exists('errorHandler')) {
    function errorHandler ()
    {
    }
}
if (! function_exists('exceptionHandler')) {
    function exceptionHandler ()
    {
    }
}
if (! function_exists('shutdownHandler')) {
    function shutdownHandler ()
    {
    }
}

if (! function_exists('addLog')) {
	function addLog ($level, $message)
	{
		
	}
}

/* EOF */