<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 13/12/2015
 * Time: 17:57
 */
require_once 'vendor/autoload.php';
require_once(__DIR__.'/config.php');

use Orm\Orm\Orm,
	\Orm\Entity\User;

Orm::init();


$user = new User();

$user->setMail('younes@gmail.com');
$user->setUsername('younes');
$user->setPassword('younes');
$user->save();

$user->setUsername('LOL');
$user->save();


$nmbUser = User::countItem();
var_dump($nmbUser);
//$user->deleteByID();
