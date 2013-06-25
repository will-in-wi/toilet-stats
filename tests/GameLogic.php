<?php

require_once '../ToiletStats/Logic/Toilet.php';

/**
* Test Game Logic
*/
class GameLogicTest extends PHPUnit_Framework_TestCase
{
	use ToiletStats\Logic;

	$method = new ReflectionMethod(
		'Foo', 'doSomethingPrivate'
	);

	$method->setAccessible(TRUE);

	$this->assertEquals(
		'blah', $method->invoke(new Foo)
	);
}