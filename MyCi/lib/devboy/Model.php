<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

importClass('Db_Query');
class Model
{
	/**
	 * 数据库只读模式
	 */
	const DB_MODE_READ = 1;
	/**
	 * 数据库只写模式
	 */
	const DB_MODE_WRITE = 2;
	/**
	 * 数据库读写模式
	 */
	const DB_MODE_READ_WRITE = 3;

	/**
	 * 存储连接池， 存放每个连接实例对象
	 * @var array
	 */
	private $_pool = array();
	/**
	 * 当前连接对象的别名
	 * @var unknown
	 */
	private $_currentAlias = null;

	protected $_db = null;

	protected $_dbMode = self::DB_MODE_READ_WRITE;

	protected $_table = '';

	protected $_prefix = '';

	protected $_pk = 'id';

	/**
	 * Class constructor
	 * @param string|array $config 数据表名称或者数据库连接参数数组
	 *
	 * @return	void
	 */
	public function __construct($config=array())
	{
	    if (is_string($config)) {
			$config = array('table'=>$config);
			$oConfig = & loadClass('config');
			$config = array_merge($config, $oConfig->get('db'));
		}

		if (is_array($config) && isset($config['type'])) {
			isset($config['params']) or $config['params'] = array();
			isset($config['dir'])    or $config['dir']    = '';
			isset($config['alias'])  or $config['alias']  = $storageType;
			isset($config['mode'])   or $config['mode']   = self::DB_MODE_READ_WRITE;
			empty($config['pk'])     or $this->_pk = $config['pk'];

		    $db = $this->dbFactory($config['type'], $config['dir'], $config['params']);
		    if ($db instanceof Db_Abstract) {
		    	$this->_pool[$alias] = array('db' => $db, 'mode' => $config['mode']);
		    	$this->_currentAlias = $config['alias'];
		    }

		    isset($config['table'])  AND $this->_table  = $config['table'];
		    isset($config['prefix']) AND $this->_prefix = $config['prefix'];
		}
	}

	/**
	 * 数据库类实例工厂
	 * @param unknown $storageType
	 * @param string $dir
	 * @param unknown $config
	 */
	public function dbFactory ($class, $dir='', $config=null)
	{
	    $dir = is_string($dir) && is_dir($dir) ? $dir : null;
		$db = & loadClass($class, $dir, $config);

		return $db;
	}

	/**
	 * 获取数据存储模型实例
	 * @param string $alias 连接别名
	 * @return null|object
	 */
	public function getDb ($alias=null)
	{
		$alias = isset($alias) ? $alias : $this->_currentAlias;
		return isset($alias, $this->_pool[$alias]) ? $this->_pool[$alias] : null;
	}

	public function setDb ($db, $alias)
	{
		if ($db instanceof Db_Abstract) {
			$this->_db = $db;
		}

		return $this;
	}

	/**
	 * 根据读写模式，随机获取数据库连接实例
	 * @param unknown $mode
	 * @return mixed|unknown
	 */
	public function getRandDbByMode ($mode)
	{
		$db = $this->_pool[$this->_currentAlias]['db'];
		$_dbList = array();
		foreach ($this->_pool as $_dbInfo) {
			if ($mode==$_dbInfo['mode'] || self::DB_MODE_READ_WRITE==$_dbInfo['mode']) {
				$_dbList[] = & $_dbInfo['db'];
			}
		}
		if ($_dbList) {
			$index = rand(0, count($_dbList)-1);
			$db = $_dbList[$index];
		}

		return $db;
	}

	public function table ($table=null)
	{
		is_string($table) AND $this->_table = $table;

		return $this->_prefix . $this->_table;
	}

	public function loadDefaultDb ()
	{
		$config = & loadClass('Config');
		$dbSetting = $config->get('db');

	}

    /**
     * Load data
     *
     * @param int $id
     * @return array
     */
    public function getById($id, $colName='')
    {
        ''==$colName OR $colName = $this->_pk;
    	$where = array($colName=>$id);

    	return $this->_db->find($this->table(), array('where'=>$where) );
    }

    /**
     * Find result
     *
     * @param array $conditions
     * @return array
     */
    public function select($table, $conditions = array())
    {
        if (is_string($conditions)) $conditions = array('where' => $conditions);

        $conditions += array('table' => $this->_table);

        try {
            $result = $this->db->find($conditions);
            return $result;
        } catch (Exception $e) {
            $this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
            return false;
        }
    }

    /**
     * Count result
     *
     * @param string $where
     * @param string $table
     * @return int
     */
    public function count($where, $table = null)
    {
        if (null == $table) $table = $this->_table;

        try {
            $result = $this->db->count($where, $table);
            return $result;
        } catch (Exception $e) {
            $this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
            return false;
        }
    }

    /**
     * Query SQL
     *
     * @param string $sql
     * @return mixed
     */
    public function query($sql)
    {
        try {
            $result = $this->db->query($sql);
            return $result;
        } catch (Exception $e) {
            $this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
            return false;
        }
    }

    /**
     * Get SQL result
     *
     * @param string $sql
     * @return array
     */
    public function sql($sql)
    {
        try {
            $result = $this->db->sql($sql);
            return $result;
        } catch (Exception $e) {
            $this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
            return false;
        }
    }

    /**
     * Insert
     *
     * @param array $data
     * @param string $table
     * @return boolean
     */
    public function insert($data, $table = null)
    {
        if (null == $table) $table = $this->_table;

        try {
            $result = $this->db->insert($data, $table);
            return $result;
        } catch (Exception $e) {
            $this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
            return false;
        }
    }

    /**
     * Update
     *
     * @param int $id
     * @param array $data
     * @return boolean
     */
    public function update($id, $data, $where='')
    {
        $where = $this->_pk . '=' . (is_int($id) ? $id : "'$id'");

        try {
            $result = $this->db->update($data, $where, $this->_table);
            return true;
        } catch (Exception $e) {
            $this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
            return false;
        }
    }

    /**
     * Delete
     *
     * @param string $where
     * @param string $table
     * @return boolean
     */
    public function delete($id, $col = null, $where)
    {
        if (is_null($col)) $col = $this->_pk;

        $where = $col . '=' . (is_int($id) ? $id : "'$id'");

        try {
            $result = $this->db->delete($where, $this->_table);
            return $result;
        } catch (Exception $e) {
            $this->error(array('code' => self::SYSTEM_ERROR, 'msg' => $e->getMessage()));
            return false;
        }
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
            case 'db' :
                $this->db = $this->db();
                return $this->db;

            case 'cache' :
                $this->cache = $this->cache();
                return $this->cache;

            case 'helper':
                $this->helper = new Cola_Helper();
                return $this->helper;

            case 'com':
                $this->com = new Cola_Com();
                return $this->com;

            default:
                throw new Exception('Undefined property: ' . get_class($this). '::' . $key);
        }
    }

}
