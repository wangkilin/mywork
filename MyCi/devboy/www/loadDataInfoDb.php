<?php
/********************************************************/
/*****                 @!!@                          ****/
/********************************************************/
/**
 *@FileName    : loadDataInfoDb.php
 *@Author      : Kilin WANG <wangkilin@126.com>
 *@Date        : 2016年9月21日
 *@Homepage    : http://www.kinful.com
 *@Version     : 0.1
 */
$dir = 'D:\\www.runoob.com\\';
$dirHandler = opendir($dir);
//$dirHandler = new Dir($dir);
function parseFile ($category, $filepath)
{

}

while(($tmpDir=readdir($dirHandler))) {
	if ('.'==$tmpDir || '..'==$tmpDir) {
		continue;
	}

	$newDir = $dir . $tmpDir .'/';
	if (! is_dir($newDir)) {
		continue;
	}
	echo $tmpDir . "\n";

	$newDirHandler = opendir($newDir);
	while (($newTmpFile=readdir($newDirHandler))) {
		if ('.'==$newTmpFile || '..'==$newTmpFile) {
			continue;
		}

		//echo $newDir . $newTmpFile;
		//echo '<br/>';
	}
	closedir($newDirHandler);
}
closedir($dirHandler);

/* EOF */