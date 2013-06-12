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
		if (count($this->unused_cards) === 0) {
			return false;
		}

		$this->add_card();

		// Add cards until the deck has at least 4.
		while (count($this->working_deck) < 4) {
			$this->add_card();
		}

		// TODO: stick the stuff below in a loop.

		$last_index = count($this->working_deck) - 1;
		$top_card = $this->working_deck[$last_index];
		$fourth_card = $this->working_deck[$last_index - 3];

		// Check for same number four cards back.
		if ($top_card->get_number() === $fourth_card->get_number()) {
			// Pull the last four cards and discard them.
			$this->discard_card($last_index);
			$this->discard_card($last_index-1);
			$this->discard_card($last_index-2);
			$this->discard_card($last_index-3);
		}
	}

	protected function add_card()
	{
		$this->working_deck[] = array_shift($this->unused_cards);
	}

	protected function discard_card($i)
	{
		unset($this->working_deck[$i]);
	}
}