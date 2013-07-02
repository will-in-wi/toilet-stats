<?php

include 'vendor/autoload.php';
use Symfony\Component\ClassLoader\UniversalClassLoader;
use ToiletStats\Cards\Deck;

$loader = new UniversalClassLoader();
$loader->useIncludePath(true);
$loader->register();

function play_game()
{
	$deck = array();
	for ($i=0; $i < 1; $i++) { 
		$deck1 = \ToiletStats\Cards\Deck::generate();
		$deck = array_merge($deck, $deck1);
	}
	// $deck1 = \ToiletStats\Cards\Deck::generate();
	// $deck2 = \ToiletStats\Cards\Deck::generate();

	// $deck = array_merge($deck1, $deck2);

	var_dump(count($deck));
	// exit();

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

for ($i=0; $i < 1; $i++) { 
	$remaining_cards = play_game();
	echo $remaining_cards . "\n";
}