<?php
/**
 *Cola_View
 */

class View
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {

    }

    /**
     * Render tpl
     *
     */
    protected function _render($tpl)
    {
    	$config = & loadClass('Config', BASE_PATH);
        ob_start();
        ob_implicit_flush(0);
        include $tpl;
        $content = ob_get_clean();

        $content = str_replace($search, $replace, $content);

        return $content;
    }

    /**
     * Fetch
     *
     * @param string $tpl
     * @return string
     */
    public function fetch($tpl)
    {
        return $this->_render($tpl);
    }

    /**
     * Display
     *
     * @param string $tpl
     */
    public function display($tpl)
    {
        echo $this->_render($tpl);
    }

    /**
     * show content
     *
     * @param string $content
     * @return string
     */
    public function show($content)
    {
        ob_start();
        ob_implicit_flush(0);
        echo $content;

        return ob_get_clean();
    }

    /**
     * Widget
     *
     * @param string $name
     * @param array $data
     * @return Cola_Com_Widget
     */
    public function widget($name, $data = null)
    {
        if (empty($this->_widgetsHome) && $widgetsHome = Cola::config('_widgetsHome')) {
            $this->_widgetsHome = $widgetsHome;
        }

        $class = ucfirst($name) . 'Widget';

        if (!Cola::loadClass($class, $this->_widgetsHome)) {
            throw new Cola_Exception("Can not find widget:{$class}");
        }

        $widget = new $class($data);

        return $widget;
    }

    /**
     * Escape
     *
     * @param string $str
     * @param string $type
     * @param string $encoding
     * @return string
     */
    public static function escape($str, $type = 'html', $encoding = 'UTF-8')
    {
        switch ($type) {
            case 'html':
                return htmlspecialchars($str, ENT_QUOTES, $encoding);

            case 'htmlall':
                return htmlentities($str, ENT_QUOTES, $encoding);

            case 'javascript':
                return strtr($str, array('\\'=>'\\\\',"'"=>"\\'",'"'=>'\\"',"\r"=>'\\r',"\n"=>'\\n','</'=>'<\/'));

            case 'mail':
                return str_replace(array('@', '.'),array(' [AT] ', ' [DOT] '), $str);

            default:
                return $str;
        }
    }

    /**
     * Truncate
     *
     * @param string $str
     * @param int $limit
     * @param string $encoding
     * @param string $suffix
     * @param string $regex
     * @return string
     */
    public static function truncate($str, $limit, $encoding = 'UTF-8', $suffix = '...', $regex = null)
    {
        if (function_exists('mb_strwidth')) {
            return  self::mbTruncate($str, $limit, $encoding, $suffix);
        }
        return self::regexTruncate($str, $limit, $encoding, $suffix, $regex = null);
    }

    /**
     * Truncate with mbstring
     *
     * @param string $str
     * @param int $limit
     * @param string $encoding
     * @param string $suffix
     * @return string
     */
    public static function mbTruncate($str, $limit, $encoding = 'UTF-8', $suffix = '...')
    {
        if (mb_strwidth($str, $encoding) <= $limit) return $str;

        $limit -= mb_strwidth($suffix, $encoding);
        $tmp = mb_strimwidth($str, 0, $limit, '', $encoding);
        return $tmp . $suffix;
    }

    /**
     * Truncate with regex
     *
     * @param string $str
     * @param int $limit
     * @param string $encoding
     * @param string $suffix
     * @param string $regex
     * @return string
     */
    public static function regexTruncate($str, $limit, $encoding = 'UTF-8', $suffix = '...', $regex = null)
    {
        $defaultRegex = array(
            'UTF-8'  => "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/",
            'GB2312' => "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/",
            'GBK'    => "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/",
            'BIG5'   => "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/"
        );

        $encoding = strtoupper($encoding);

        if (null === $regex && !isset($defaultRegex[$encoding])) {
            throw new Exception("Truncate failed: not supported encoding, you should supply a regex for $encoding encoding");
        }

        $regex || $regex = $defaultRegex[$encoding];

        preg_match_all($regex, $str, $match);

        $trueLimit = $limit - strlen($suffix);
        $len = $pos = 0;

        foreach ($match[0] as $word) {
            $len += strlen($word) > 1 ? 2 : 1;
            if ($len > $trueLimit) continue;
            $pos ++;
        }
        if ($len <= $limit) return $str;
        return join("",array_slice($match[0], 0, $pos)) . $suffix;
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
        return null;
    }
}