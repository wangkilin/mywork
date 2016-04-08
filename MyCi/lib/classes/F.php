<?php
/********************************************************/
/*****                 @!!@                          ****/
/********************************************************/
/**
 *@FileName    : F.php
 *@Author      : Kilin WANG <wangkilin@126.com>
 *@Date        : 2016年4月8日
 *@Homepage    : http://www.kinful.com
 *@Version     : 0.1
 */
function I ()
{

}
class F
{
	/**
	 * 判断是否为手机访问
	 * @return bool
	 */
	static public function isMobile ()
	{
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		$isMobile = I('__ignoreMobile')
		   OR preg_match('/iemobile|mobile\ssafari|iphone\sos|android|symbian|series40/i', $ua);


		return $isMobile;
	}
}