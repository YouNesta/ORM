<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 13/12/2015
 * Time: 17:58
 */
namespace Orm\Orm;

use Symfony\Component\Yaml\Parser;


class Orm extends \PDO
{
	private static $connexion = NULL;

	public static function init()
	{
		$yaml = new Parser();
		$data = $yaml->parse(file_get_contents(OrmDir.'/app/config/config_dev.yml'));

		$host = $data['database']['host'];
		$db = $data['database']['dbname'];
		$user = $data['database']['user'];
		$password = $data['database']['password'];

		self::$connexion = new \PDO('mysql:host='.$host.';dbname='.$db.';charset=UTF8', $user, $password);
		self::$connexion->query("SET NAMES utf8;");
		// UTILISER EXEPTION POUR VERIFIER QUE TOUT C'EST BIEN PASSÉ !
	}

	public static function getConnexion()
	{
		return self::$connexion;
	}


}