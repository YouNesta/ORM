<?php


require_once('vendor/autoload.php');
require_once('config.php');

function do_tabs($n = 0)
{
	$ret = "\t";
	for ($i=0; $i < $n; $i++) {
		$ret .= "\t";
	}
	return $ret;

}
function jump($n = 0)
{

	$ret = "\n";
	for ($i=0; $i < $n; $i++) {
		$ret .= "\n";
	}
	return $ret;

}

use Orm\Orm\Orm;

Orm::init();

$connexion = Orm::getConnexion();

$result = $connexion->query("Show columns FROM user")->fetchAll();

$fields = [];

foreach($result as $field){

	array_push($fields, $field['Field']);

}

$className = $argv[1];

// Do some magic here
$code = "<?php " . jump(2);
$code .= "namespace Orm\\Entity;" . jump(2);
$code .= "use Orm\\Orm\\QueryManager;" . jump(2);
$code .= "class $className extends QueryManager" . jump()."{" . jump();
foreach ($fields as $field)
{
	$code .= do_tabs() . 'protected $'.$field.";" . jump();
}
$code .= jump();
foreach ($fields as $field)
{
	$code .= do_tabs() . 'public function get'.ucfirst($field)."()" . jump();
	$code .= do_tabs() . "{" . jump();
	$code .= do_tabs(1) . 'return $this->'.$field.";" . jump();
	$code .= do_tabs() . "}" . jump(2);
	$code .= do_tabs() . 'public function set'.ucfirst($field).'($'.$field.")" . jump();
	$code .= do_tabs() . "{" . jump();
	$code .= do_tabs(1) . '$this->'.$field.' = $'.$field.";" . jump();
	$code .= do_tabs() . "}" . jump(2);
}

$code .= do_tabs() . "public function save()" . jump();
$code .= do_tabs() . "{" . jump();
$code .= do_tabs(1) . '$this->persist($this) '.";" . jump();
$code .= do_tabs() . "}" . jump(2);

$code .= do_tabs() . "public static function factory()" . jump();
$code .= do_tabs() . "{" . jump();
$code .= do_tabs(1) . 'return new '.ucfirst($className).";" . jump();
$code .= do_tabs() . "}" . jump(2);

$code .= do_tabs() . "public static function countItem()" . jump();
$code .= do_tabs() . "{" . jump();
$code .= do_tabs(1) . '$self = self::factory()'.";" . jump();
$code .= do_tabs(1) . '$result = $self::countItems($self)'.";" . jump();
$code .= do_tabs(1) . 'return $result'.";" . jump();
$code .= do_tabs() . "}" . jump(2);


$code .= "}\n";
file_put_contents($className.".php", $code);

// Do some magic here