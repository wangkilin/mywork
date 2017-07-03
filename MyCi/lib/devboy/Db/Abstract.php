<?php
class Db_Abstract
{
	/**
	 * 数据库连接对象
	 *
	 * @var object|resource|null
	 */
	protected $_connection = null;

	/**
	 * 数据库设置
	 *
	 * @var array
	 */
	protected $_config = array(
			'host' => '',
			'port' => '',
			'username' => '',
			'password' => '',
			'database' => '',
			'charset'  => '',
			'options'  => array()
	);

	/**
	 * Query handler
	 *
	 * @var resource
	 */
	protected $_query = null;

	/**
	 * Last query sql
	 *
	 * @var string
	 */
	protected $_lastSql;

	/**
	 * Constructor.
	 * @param  array $config
	 */
	public function __construct($config)
	{
		foreach ($config as $_key=>$_value) {
			$_key = strtolower($_key);
			if (isset($this->_config[$_key])) {
				$this->_config[$_key] = $_value;
			}
		}

		if (''==$this->_config['host'] || ''==$this->_config['database']) {
			throw new Exception('Wrong database connection params', Constants::ERROR_DB_CONNECT_PARAMS);
		}

		$this->connectDb();
	}

	/**
	 * Get db connection
	 *
	 * @return resource
	 */
	public function getConnection()
	{
		return $this->_connection;
	}

	/**
	 * Returns the underlying database connection object or resource.
	 * If not presently connected, this initiates the connection.
	 *
	 * @return object|resource|null
	 */
	public function connectDb()
	{
		is_object($this->_connection) OR $this->_connect($this->_config);

		return $this;
	}

	/**
	 * Get SQL result
	 *
	 * @param string $sql
	 * @param string $type
	 * @return mixed
	 */
	public function sql($sql, $type = 'ASSOC')
	{
		$this->query($sql);

		$tags = explode(' ', $sql, 2);
		switch (strtoupper($tags[0])) {
			case 'SELECT':
				($result = $this->fetchAll($type)) || ($result = array());
				break;
			case 'INSERT':
				$result = $this->lastInsertId();
				break;
			case 'UPDATE':
			case 'DELETE':
				$result = $this->affectedRows();
				break;
			default:
				$result = $this->_query;
		}

		return $result;
	}

	/**
	 * Get a result row
	 *
	 * @param string $sql
	 * @param string $type
	 * @return array
	 */
	public function row($sql, $type = 'ASSOC')
	{
		$this->query($sql);
		return $this->fetch($type);
	}

	/**
	 * Get first column of result
	 *
	 * @param string $sql
	 * @return string
	 */
	public function col($sql)
	{
		$this->query($sql);
		$result = $this->fetch();
		return empty($result) ? null : current($result);
	}

	/**
	 * Find data
	 *
	 * @param array $conditions
	 * @return array
	 */
	public function find($table, $conditions)
	{
		$result = array();

		if (is_string($conditions)) $conditions = array('where' => $conditions);

		$conditions = $conditions + array(
				'fileds' => '*',
				'where' => 1,
				'order' => null,
				'start' => -1,
				'limit' => -1
		);

		extract($conditions);

		$sql = "select {$fileds} from $table where $where";

		if ($order) $sql .= " order by {$order}";

		if (0 <=$start && 0 <= $limit) $sql .= " limit {$start}, {$limit}";

		$data = $this->result($sql);

		return $data;
	}

	/**
	 * Insert
	 *
	 * @param array $data
	 * @param string $table
	 * @return boolean
	 */
	public function insert($table, $dataSet)
	{
		$keys = '';
		$values = '';
		foreach ($dataSet as $key => $value) {
			$keys .= "`$key`,";
			$values .= "'" . $this->escape($value) . "',";
		}
		$sql = "insert into $table (" . substr($keys, 0, -1) . ") values (" . substr($values, 0, -1) . ");";
		return $this->result($sql);
	}

	/**
	 * Update table
	 *
	 * @param array $data
	 * @param string $where
	 * @param string $table
	 * @return int
	 */
	public function update($table, $dataSet, $whereSet)
	{
		$tmp = array();

		foreach ($data as $key => $value) {
			$tmp[] = "`$key`='" . $this->escape($value) . "'";
		}

		$str = implode(',', $tmp);

		$sql = "update $table set " . $str . " where $where";

		return $this->result($sql);
	}

	/**
	 * Delete from table
	 *
	 * @param string $where
	 * @param string $table
	 * @return int
	 */
	public function delete($table, $whereSet)
	{
		$sql = "delete from $table where $where";
		return $this->result($sql);
	}

	/**
	 * Count num rows
	 *
	 * @param string $where
	 * @param string $table
	 * @return int
	 */
	public function count($where, $table)
	{
		$sql = "select count(1) as cnt from $table where $where";
		$this->query($sql);
		$result = $this->fetch();
		return empty($result['cnt']) ? 0 : $result['cnt'];
	}

	/**
	 * Get last query sql
	 *
	 * @return string
	 */
	public function lastSql()
	{
		return $this->_lastSql;
	}

	public function beginTransaction () {	}

	public function commit () {	}

	public function rollBack () {	}

	public function free () {}

	public function close () {}

	public function charset ($charset) {}


	abstract protected function _connect($params);

	abstract public function getError($type = 'STRING');

	abstract public function query($sql);

	abstract public function affectedRows();

	abstract public function lastInsertId();

	abstract public function fetch($type);

	abstract public function fetchAll($type);

	abstract public function escapeString($string);

}
/**
 * Typecho Blog Platform
 *
 * @copyright  Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license    GNU General Public License 2.0
 * @version    $Id: Db.php 107 2008-04-11 07:14:43Z magike.net $
 */

/**
 * 包含获取数据支持方法的类.
 * 必须定义__TYPECHO_DB_HOST__, __TYPECHO_DB_PORT__, __TYPECHO_DB_NAME__,
 * __TYPECHO_DB_USER__, __TYPECHO_DB_PASS__, __TYPECHO_DB_CHAR__
 *
 * @package Db
 */
class Typecho_Db
{
    /** 读取数据库 */
    const READ = 1;

    /** 写入数据库 */
    const WRITE = 2;

    /** 升序方式 */
    const SORT_ASC = 'ASC';

    /** 降序方式 */
    const SORT_DESC = 'DESC';

    /** 表内连接方式 */
    const INNER_JOIN = 'INNER';

    /** 表外连接方式 */
    const OUTER_JOIN = 'OUTER';

    /** 表左连接方式 */
    const LEFT_JOIN = 'LEFT';

    /** 表外连接方式 */
    const RIGHT_JOIN = 'RIGHT';

    /** 数据库查询操作 */
    const SELECT = 'SELECT';

    /** 数据库更新操作 */
    const UPDATE = 'UPDATE';

    /** 数据库插入操作 */
    const INSERT = 'INSERT';

    /** 数据库删除操作 */
    const DELETE = 'DELETE';

    /**
     * 数据库适配器
     * @var Typecho_Db_Adapter
     */
    private $_adapter;

    /**
     * 默认配置
     *
     * @access private
     * @var Typecho_Config
     */
    private $_config;

    /**
     * 连接池
     *
     * @access private
     * @var array
     */
    private $_pool;

    /**
     * 已经连接
     *
     * @access private
     * @var array
     */
    private $_connectedPool;

    /**
     * 前缀
     *
     * @access private
     * @var string
     */
    private $_prefix;

    /**
     * 适配器名称
     *
     * @access private
     * @var string
     */
    private $_adapterName;

    /**
     * 实例化的数据库对象
     * @var Typecho_Db
     */
    private static $_instance;

    /**
     * 数据库类构造函数
     *
     * @param mixed $adapterName 适配器名称
     * @param string $prefix 前缀
     * @throws Typecho_Db_Exception
     */
    public function __construct($adapterName, $prefix = 'typecho_')
    {
        /** 获取适配器名称 */
        $this->_adapterName = $adapterName;

        /** 数据库适配器 */
        $adapterName = 'Typecho_Db_Adapter_' . $adapterName;

        if (!call_user_func(array($adapterName, 'isAvailable'))) {
            throw new Typecho_Db_Exception("Adapter {$adapterName} is not available");
        }

        $this->_prefix = $prefix;

        /** 初始化内部变量 */
        $this->_pool = array();
        $this->_connectedPool = array();
        $this->_config = array();

        //实例化适配器对象
        $this->_adapter = new $adapterName();
    }

    /**
     * 获取适配器名称
     *
     * @access public
     * @return string
     */
    public function getAdapterName()
    {
        return $this->_adapterName;
    }

    /**
     * 获取表前缀
     *
     * @access public
     * @return string
     */
    public function getPrefix()
    {
        return $this->_prefix;
    }

    /**
     * getConfig
     *
     * @access public
     * @return void
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * 获取SQL词法构建器实例化对象
     *
     * @return Typecho_Db_Query
     */
    public function sql()
    {
        return new Typecho_Db_Query($this->_adapter, $this->_prefix);
    }

    /**
     * 为多数据库提供支持
     *
     * @access public
     * @param Typecho_Db $db 数据库实例
     * @param integer $op 数据库操作
     * @return void
     */
    public function addServer($config, $op)
    {
        $this->_config[] = Typecho_Config::factory($config);
        $key = count($this->_config) - 1;

        /** 将连接放入池中 */
        switch ($op) {
            case self::READ:
            case self::WRITE:
                $this->_pool[$op][] = $key;
                break;
            default:
                $this->_pool[self::READ][] = $key;
                $this->_pool[self::WRITE][] = $key;
                break;
        }
    }

    /**
     * 设置默认数据库对象
     *
     * @access public
     * @param Typecho_Db $db 数据库对象
     * @return void
     */
    public static function set(Typecho_Db $db)
    {
        self::$_instance = $db;
    }

    /**
     * 获取数据库实例化对象
     * 用静态变量存储实例化的数据库对象,可以保证数据连接仅进行一次
     *
     * @return Typecho_Db
     * @throws Typecho_Db_Exception
     */
    public static function get()
    {
        if (empty(self::$_instance)) {
            /** Typecho_Db_Exception */
            throw new Typecho_Db_Exception('Missing Database Object');
        }

        return self::$_instance;
    }

    /**
     * 选择查询字段
     *
     * @access public
     * @param mixed $field 查询字段
     * @return Typecho_Db_Query
     */
    public function select()
    {
        $args = func_get_args();
        return call_user_func_array(array($this->sql(), 'select'), $args ? $args : array('*'));
    }

    /**
     * 更新记录操作(UPDATE)
     *
     * @param string $table 需要更新记录的表
     * @return Typecho_Db_Query
     */
    public function update($table)
    {
        return $this->sql()->update($table);
    }

    /**
     * 删除记录操作(DELETE)
     *
     * @param string $table 需要删除记录的表
     * @return Typecho_Db_Query
     */
    public function delete($table)
    {
        return $this->sql()->delete($table);
    }

    /**
     * 插入记录操作(INSERT)
     *
     * @param string $table 需要插入记录的表
     * @return Typecho_Db_Query
     */
    public function insert($table)
    {
        return $this->sql()->insert($table);
    }

    /**
     * 执行查询语句
     *
     * @param mixed $query 查询语句或者查询对象
     * @param boolean $op 数据库读写状态
     * @param string $action 操作动作
     * @return mixed
     */
    public function query($query, $op = self::READ, $action = self::SELECT)
    {
        /** 在适配器中执行查询 */
        if ($query instanceof Typecho_Db_Query) {
            $action = $query->getAttribute('action');
            $op = (self::UPDATE == $action || self::DELETE == $action
            || self::INSERT == $action) ? self::WRITE : self::READ;
        } else if (!is_string($query)) {
            /** 如果query不是对象也不是字符串,那么将其判断为查询资源句柄,直接返回 */
            return $query;
        }

        /** 选择连接池 */
        if (!isset($this->_connectedPool[$op])) {
            if (empty($this->_pool[$op])) {
                /** Typecho_Db_Exception */
                throw new Typecho_Db_Exception('Missing Database Connection');
            }

            //获取相应读或写服务器连接池中的一个
            $selectConnection = rand(0, count($this->_pool[$op]) - 1);
            //获取随机获得的连接池配置
            $selectConnectionConfig = $this->_config[$this->_pool[$op][$selectConnection]];
            $selectConnectionHandle = $this->_adapter->connect($selectConnectionConfig);
            $this->_connectedPool[$op] = &$selectConnectionHandle;

        }
        $handle = $this->_connectedPool[$op];

        /** 提交查询 */
        $resource = $this->_adapter->query($query, $handle, $op, $action);

        if ($action) {
            //根据查询动作返回相应资源
            switch ($action) {
                case self::UPDATE:
                case self::DELETE:
                    return $this->_adapter->affectedRows($resource, $handle);
                case self::INSERT:
                    return $this->_adapter->lastInsertId($resource, $handle);
                case self::SELECT:
                default:
                    return $resource;
            }
        } else {
            //如果直接执行查询语句则返回资源
            return $resource;
        }
    }

    /**
     * 一次取出所有行
     *
     * @param mixed $query 查询对象
     * @param array $filter 行过滤器函数,将查询的每一行作为第一个参数传入指定的过滤器中
     * @return array
     */
    public function fetchAll($query, array $filter = NULL)
    {
        //执行查询
        $resource = $this->query($query, self::READ);
        $result = array();

        /** 取出过滤器 */
        if (!empty($filter)) {
            list($object, $method) = $filter;
        }

        //取出每一行
        while ($rows = $this->_adapter->fetch($resource)) {
            //判断是否有过滤器
            $result[] = $filter ? call_user_func(array(&$object, $method), $rows) : $rows;
        }

        return $result;
    }

    /**
     * 一次取出一行
     *
     * @param mixed $query 查询对象
     * @param array $filter 行过滤器函数,将查询的每一行作为第一个参数传入指定的过滤器中
     * @return stdClass
     */
    public function fetchRow($query, array $filter = NULL)
    {
        $resource = $this->query($query, self::READ);

        /** 取出过滤器 */
        if ($filter) {
            list($object, $method) = $filter;
        }

        return ($rows = $this->_adapter->fetch($resource)) ?
        ($filter ? $object->$method($rows) : $rows) :
        array();
    }

    /**
     * 一次取出一个对象
     *
     * @param mixed $query 查询对象
     * @param array $filter 行过滤器函数,将查询的每一行作为第一个参数传入指定的过滤器中
     * @return array
     */
    public function fetchObject($query, array $filter = NULL)
    {
        $resource = $this->query($query, self::READ);

        /** 取出过滤器 */
        if ($filter) {
            list($object, $method) = $filter;
        }

        return ($rows = $this->_adapter->fetchObject($resource)) ?
        ($filter ? $object->$method($rows) : $rows) :
        new stdClass();
    }
}
