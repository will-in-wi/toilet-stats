<?php

require_once 'card.php';

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
}