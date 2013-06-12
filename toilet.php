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
		// TODO: Check for 0 unused cards

		// Add cards until the deck has at least 4.
		while (count($this->working_deck) < 4) {
			$this->working_deck[] = array_shift($this->unused_cards);
		}

		// TODO: stick the stuff below in a loop.

		$last_index = count($this->working_deck) - 1;
		$top_card = $this->working_deck[$last_index];
		$fourth_card = $this->working_deck[$last_index - 3];

		// Check for same number four cards back.
		if ($top_card->get_number() === $fourth_card->get_number()) {
			// Pull the last four cards and discard them.
			unset($this->working_deck[$last_index]);
			unset($this->working_deck[$last_index-1]);
			unset($this->working_deck[$last_index-2]);
			unset($this->working_deck[$last_index-3]);
		}
	}
}