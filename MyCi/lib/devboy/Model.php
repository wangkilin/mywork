<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Model
{
	protected $_db = null;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct($config=null)
	{
		if (is_array($config) && isset($config['dbClass'])) {
			$dir = isset($config['dir']) ? $config['dir'] : null;
			$alias = isset($config['alias']) && is_array($config['alias'])
			             ? $config['alias'] : null;
			$this->_db = & loadClass($config['dbClass'], $dir, $config, $alias);
		}
	}

	public function setDb ($db)
	{
		if ($db instanceof Db) {
			$this->_db = $db;
		}

		return $this;
	}

	public function loadDefaultDb ()
	{
		$config = & loadClass('Config');
		$dbSetting = $config->get('db');

	}


	// --------------------------------------------------------------------

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}

}
