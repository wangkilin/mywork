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
	//echo $filepath;
	$content = file_get_contents($filepath);
	//echo $content;
	preg_match('/<\/div>\s<div class="article-body">(.*)<\/div>\s<div class="previous-next-links">/su', $content, $match);
	//var_dump($match);
	if (strpos($content, '</div> <div class="next">')) {
		echo $content;
		echo $filepath;
		exit;
	}
	if ($match) {
		var_dump($match);
		exit;
	}
	//exit;
}
try {
	while(($tmpDir=readdir($dirHandler)) || $tmpDir==='0') {
		if ('.'==$tmpDir || '..'==$tmpDir) {
			continue;
		}

		$newDir = $dir . $tmpDir . DIRECTORY_SEPARATOR;
		if (! is_dir($newDir)) {
			continue;
		}
		//echo $tmpDir . "\n";

		$newDirHandler = opendir($newDir);
		while (($newTmpFile=readdir($newDirHandler))) {
			$newTmpFile = $newDir . DIRECTORY_SEPARATOR . $newTmpFile;
			if (! is_file($newTmpFile)) {
				continue;
			}

			parseFile($tmpDir, $newTmpFile);

			//echo $newDir . $newTmpFile;
			//echo '<br/>';
		}
		closedir($newDirHandler);
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
closedir($dirHandler);

/* EOF */