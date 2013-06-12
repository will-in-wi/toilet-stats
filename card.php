<?php

/**
* Cards
* 
* Ace is 1
* Jack is 11
* Queen 12
* King 13
*/
class Card
{
	private $suit;
	private $number;

	function __construct($suit, $number)
	{
		$this->suit   = $suit;
		$this->number = $number;
	}
}