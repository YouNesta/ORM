<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 13/12/2015
 * Time: 17:58
 */
namespace Orm\Orm;

use Symfony\Component\Yaml\Parser,
		Orm\Log,
		Orm\Exceptions\ConnexionException;



class Orm extends \PDO
{
	private static $connexion = NULL;

	public static function init()
	{
		$yaml = new Parser();
		$data = $yaml->parse(file_get_contents(baseDir.'/app/config/config_'.ENV.'.yml'));

		$host = $data['database']['host'];
		$db = $data['database']['dbname'];
		$user = $data['database']['user'];
		$password = $data['database']['password'];
		try {
			try{
				self::$connexion = new \PDO('mysql:host='.$host.';dbname='.$db.'', $user, $password, array(
						\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
				));
				self::$connexion->query("SET NAMES utf8");
			}catch(\PDOException $e){
				throw new ConnexionException('Erreur lors de la connexion a la base de données '.$db.' : '.$e->getMessage());
			}
		} catch (ConnexionException $e) {
			echo $e->getMessage();
		}
	}

	public static function getConnexion()
	{
		return self::$connexion;
	}




}