<?php

/**
* Game code
*/
class Toilet
{
	private $unused_cards;
	private $working_deck = array();

	function __construct($deck)
	{
		$this->unused_cards = $deck;
	}

	public function round()
	{
		// Add cards until the deck has at least 4.
		while (count($this->working_deck) < 4) {
			$this->working_deck[] = array_shift($this->unused_cards);
		}

	}
}