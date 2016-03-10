<?php
/* *
 * 功能：服务器同通知页面
 */

require_once("yun.config.php");


		$sql = "select * from " . DB_PREFIX . "order where orderid='201509072205291'";
		$result = mysql_query ( $sql, $conn );
		$row=mysql_fetch_row($result);
		print_r($row[5]);
		
?>
        