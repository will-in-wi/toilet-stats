<?php

include 'vendor/autoload.php';

// require_once '/path/to/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();

// You can search the include_path as a last resort.
$loader->useIncludePath(true);

// $loader->registerNamespace('ToiletStats', __DIR__.'ToiletStats');
// $loader->registerNamespace('ToiletStats\Cards', __DIR__.'ToiletStats/Cards');
// $loader->registerNamespace('ToiletStats\Logic', __DIR__.'ToiletStats/Logic');
// ... register namespaces and prefixes here - see below

$loader->register();


$deck = \ToiletStats\Cards\Deck::generate();

// Shuffle deck
shuffle($deck);

$game = new Toilet($deck);
$game->round();

// var_dump($deck);