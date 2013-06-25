<?php

include 'vendor/autoload.php';
use Symfony\Component\ClassLoader\UniversalClassLoader;
use ToiletStats\Cards\Deck;

$loader = new UniversalClassLoader();
$loader->useIncludePath(true);
$loader->register();

function play_game()
{
	$deck = \ToiletStats\Cards\Deck::generate();

	// Shuffle deck
	shuffle($deck);

	$game = new \ToiletStats\Logic\Toilet($deck);

	$playing = true;
	while ($playing === true) {
		// echo "Play round!\n";
		$playing = $game->round();

		// Deck::format($game->get_deck());
	}

	return count($game->get_deck());
}

for ($i=0; $i < 20000; $i++) { 
	$remaining_cards = play_game();
	echo $remaining_cards . "\n";
}