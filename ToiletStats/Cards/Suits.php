<?php

namespace ToiletStats\Cards;

/**
* Suits
*/
class Suits
{
	const Heart = 0;
	const Spade = 1;
	const Diamond = 2;
	const Club = 3;

	static public function get_suit_text($suit)
	{
		switch ($suit) {
			case 0:
				return 'heart';
				break;
			
			case 1:
				return 'spade';
				break;
			
			case 2:
				return 'diamond';
				break;
			
			case 3:
				return 'club';
				break;
			
			default:
				throw new Exception('Invalid suit.');
		}
	}

	static public function get_suit_symbol($suit)
	{
		switch ($suit) {
			case 0:
				return '♥';
				break;
			
			case 1:
				return '♠';
				break;
			
			case 2:
				return '♦';
				break;
			
			case 3:
				return '♣';
				break;
			
			default:
				throw new Exception('Invalid suit.');
		}
	}

	static public function get_formatted_number($number)
	{
		switch ($number) {
			case 0:
				return 'A';
				break;
			
			case 11:
				return 'J';
				break;

			case 12:
				return 'Q';
				break;

			case 13:
				return 'K';
				break;

			default:
				return (string) $number;
				break;
		}
	}
}