--TEST--
Test new overload
--INI--
uopz.overloads=1
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
uopz_overload(ZEND_NEW, function(&$class){
	if ($class == "stdClass") {
		$class = "myClass";
	}
});

class myClass {}

$class = new stdClass();

var_dump($class instanceof myClass);

uopz_overload(ZEND_NEW, null);

$class = new stdClass();

var_dump($class instanceof stdClass);
?>
--EXPECTF--
bool(true)
bool(true)
