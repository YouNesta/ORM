<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 14/12/2015
 * Time: 11:06
 */
namespace Orm\Interfaces;

interface QueryInterface {

	function select($table, $column);
	function update();
	function delete();
	function insert($table, $methods);
	function count();

}