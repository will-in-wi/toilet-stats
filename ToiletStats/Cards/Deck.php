<?php

namespace ToiletStats\Cards;

/**
* Create a deck
*/
class Deck
{
	static public function generate()
	{
		$deck = array();

		for ($number=1; $number <= 13; $number++) { 
			// Generates all numbers.
			for ($suit=0; $suit <= 3; $suit++) { 
				// Generate all suits.
				$deck[] = new Card($suit, $number);
			}
		}

		return $deck;
	}

	static public function format($deck)
	{
		foreach ($deck as $i => $card) {
			print $i . ' => ';
			print Suits::get_formatted_number($card->get_number());
			print ' of ';
			print Suits::get_suit_symbol($card->get_suit());
			print "\n";
		}
	}
}