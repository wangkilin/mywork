<?php
defined('BASE_PATH') OR exit('Access not allowed');

class Controller
{
    protected $_config = null;

    /**
     * The home directory of model
     *
     * @var string
     */
    protected $_modelDir = null;

    /**
     * The home directory of view
     *
     * @var string
     */
    protected $_viewDir = null;

    protected $_helperDir = null;

    protected $_widgetDir = null;

    /**
     * Form keys
     *
     * @var array
     */
    protected $_keys = array();

    /**
     * Error
     *
     * @var array
    */
    protected $_error;

    /**
     * Constructor
     *
     * Init $_modelsHome & $_viewsHome from config if they are null
     */
    public function __construct()
    {
        foreach (loadClass() as $key=>$instance) {
            $this->$key = $instance;
        }

        $this->_modelDir = APP_PATH . 'models' . DS;
        $this->_viewDir  = APP_PATH . 'views' . DS;
        if (''!==$this->Router->getDir()) {
            $this->_viewDir  .= $this->Router->getDir() . DS;
        }
        $this->_viewDir .= $this->Router->getController() . DS;
    }

    /**
     * View
     *
     * @param array $config
     * @return Cola_View
     */
    protected function view($params = array())
    {
        $params = (array)$params + array('basePath' => $this->_viewsHome) + (array) Cola::config('_view');

        return $this->view = new Cola_View($params);
    }

    /**
     * Display the view
     *
     * @param string $tpl
     */
    protected function display($tpl = null)
    {
        if (empty($tpl)) {
            $tpl = $this->_viewDir . $this->Request->getAction() . $this->Config->get('tplSuffix');
        }

        $this->view->display($tpl);
    }

    protected function show ($content)
    {

    }

    /**
     * Instantiated model
     *
     * @param string $name
     * @param string $dir
     * @return Cola_Model
     */
    protected function model($name = null)
    {
        if (null === $name) {
            return $this->model;
        }

        null === $dir && $dir = $this->_modelsHome;
        $class = ucfirst($name) . 'Model';
        if (Cola::loadClass($class, $dir)) {
            return new $class();
        }

        throw new exception("Can't load model '$class' from '$dir'");
    }

    protected function setPath ($type, $dir)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'model':
            case 'view':
            case 'helper':
                $pathKey = '_' . $type . 'Dir';
                $this->$pathKey = $dir;
                break;

            default:
                break;
        }

        return $this;
    }

    /**
     * Set model home directory
     *
     * @param string $dir
     * @return Cola_Controller
     */
    protected function setModelDir($dir)
    {
        $this->_modelDir = $dir;

        return $this;
    }

    /**
     * Set view home directory
     *
     * @param string $dir
     * @return Cola_Controller
     */
    protected function setViewDir($dir)
    {
        $this->_viewDir = $dir;

        return $this;
    }

    protected function setHelperDir ($dir)
    {
        $this->_helperDir = $dir;

        return $this;
    }

    protected function setWidgetDir ($dir)
    {
        $this->_widgetDir = $dir;

        return $this;
    }

    /**
     * Redirect to other url
     *
     * @param string $url
     */
    protected function redirect($url)
    {
        Response::redirect($url, $code);
    }

    /**
     * Dynamic set vars
     *
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value = null)
    {
        $this->$key = $value;
    }

    /**
     * Dynamic get vars
     *
     * @param string $key
     */
    public function __get($key)
    {
        switch ($key) {
            case 'view':
                $this->view();
                return $this->view;

            case 'model':
                $class = get_class($this);
                $this->model = $this->model(substr($class, 0, -10));
                return $this->model;

            case 'helper':
                $this->helper = new Cola_Helper();
                return $this->helper;

            case 'com':
                $this->com = new Cola_Com();
                return $this->com;

            case 'request':
                $this->request = new Cola_Request();
                return $this->request;

            case 'response':
                $this->response = new Cola_Response();
                return $this->response;

            default:
                throw new Cola_Exception('Undefined property: ' . get_class($this) . '::' . $key);
        }
    }
}
