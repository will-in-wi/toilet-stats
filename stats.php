<?php

include 'vendor/autoload.php';
use Symfony\Component\ClassLoader\UniversalClassLoader;
use ToiletStats\Cards\Deck;

$loader = new UniversalClassLoader();
$loader->useIncludePath(true);
$loader->register();

function play_game($decks = 1)
{
	$deck = array();
	for ($i=0; $i < $decks; $i++) { 
		$deck1 = \ToiletStats\Cards\Deck::generate();
		$deck = array_merge($deck, $deck1);
	}
	
	// Shuffle deck(s)
	shuffle($deck);

	$game = new \ToiletStats\Logic\Toilet($deck);

	$playing = true;
	while ($playing === true) {
		$playing = $game->round();

		// Deck::format($game->get_deck());
	}

	return count($game->get_deck());
}

for ($i=0; $i < 1; $i++) { 
	$remaining_cards = play_game();
	echo $remaining_cards . "\n";
}