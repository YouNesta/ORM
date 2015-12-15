<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 13/12/2015
 * Time: 21:17
 */

/** Set base directory*/
define("baseDir", __DIR__);

/** Set Environnement Developpement */
define("ENV", 'dev');

/** Create Folder for Log */

if(!is_dir(baseDir.'/app/log/')){
	mkdir(baseDir.'/app/log/');
}

