<?php

include_once 'suits.php';
include_once 'deck.php';
include_once 'card.php';
include_once 'toilet.php';

$deck = Deck::generate();

// Shuffle deck
shuffle($deck);

$game = new Toilet($deck);
$game->round();

// var_dump($deck);