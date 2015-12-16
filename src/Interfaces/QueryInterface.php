<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 14/12/2015
 * Time: 11:06
 */
namespace Orm\Interfaces;

interface QueryInterface {

	public function select($table, $column);
	public function update($method);
	public function delete();
	public function insert($methods);
	public static function countItems($self);

}