<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 13/12/2015
 * Time: 22:52
 */
namespace Orm;

class Log {
	private static $accessLog = baseDir.'/app/log/access.log';
	private static $errorLog = baseDir.'/app/log/error.log';

	public static function access($info){
		file_put_contents(self::$accessLog, date("[d/m/y H:i:s]")." : ".$info." \n", FILE_APPEND);
	}
	public static function error($info){
		file_put_contents(self::$errorLog, date("[d/m/y H:i:s]")." : ".$info->errorInfo()[2]." \n", FILE_APPEND);
	}
}