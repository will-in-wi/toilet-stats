<?php

namespace ToiletStats\Logic;

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

	public function get_deck()
	{
		return $this->working_deck;
	}

	public function round()
	{
		if (count($this->unused_cards) === 0) {
			return false;
		}


		// Add cards until the deck has at least 4.
		do {
			$this->add_card();
		} while (count($this->working_deck) < 4 && count($this->unused_cards) > 0);


		// Play a round.
		$did_stuff = true;
		while ($did_stuff === true) {
			$same_number = $this->check_same_number();
			$same_suit = $this->check_same_suit();

			$did_stuff = ($same_suit || $same_number);
		}

		return true;
	}

	protected function add_card()
	{
		$this->working_deck[] = array_shift($this->unused_cards);
	}

	protected function discard_card($i)
	{
		unset($this->working_deck[$i]);
	}

	protected function check_same_number()
	{
		if (count($this->working_deck) < 4) {
			return false;
		}

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

			// Clean up key numbering
			$this->working_deck = array_values($this->working_deck);
			return true;
		}

		return false;
	}

	protected function check_same_suit()
	{
		if (count($this->working_deck) < 4) {
			return false;
		}

		$last_index = count($this->working_deck) - 1;
		$top_card = $this->working_deck[$last_index];
		$fourth_card = $this->working_deck[$last_index - 3];

		// Check for the same suit four cards back.
		if ($top_card->get_suit() === $fourth_card->get_suit()) {
			// Pull the last four cards and discard them.
			$this->discard_card($last_index-1);
			$this->discard_card($last_index-2);
			$this->working_deck = array_values($this->working_deck);
			return true;
		}

		return false;
	}
}