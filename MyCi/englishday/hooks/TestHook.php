<?php
class TestHook
{
    public function hookTest()
    {
        //var_dump(func_get_args());
        //var_dump('<hr>', $GLOBALS['params'], '<hr>');
        $routeModel = & load_class('Router');
        if ('admin/'==$routeModel->directory
           && 'index'==$routeModel->class
           && 'index'==$routeModel->method) {
        	echo 'this is called by Hook';
        }
    }
}