<?php

require_once __DIR__ . '/vendor/autoload.php';

use Autoload\Homework\Core\BattleUnit;
use Autoload\Homework\King;

$king = new King(100, 2);
$enemy_king = new King(100, 3);

$first_bu = BattleUnit::get_unit('infantry');
$second_bu = BattleUnit::get_unit('knight');

// var_dump($first_bu);
// var_dump($second_bu);

$first_bu->attack($second_bu);
$second_bu->attack($first_bu);

// var_dump($first_bu);
// var_dump($second_bu);

/*
$king->recruit('knight');
$king->recruit('knight');
$king->recruit('knight');

$enemy_king->recruit('infantry');
$enemy_king->recruit('infantry');
$enemy_king->recruit('infantry');
$enemy_king->recruit('infantry');
$enemy_king->recruit('infantry');
$enemy_king->recruit('infantry');


var_dump($king);
var_dump($enemy_king);
$king->attack($enemy_king);
$enemy_king->attack($king);
var_dump($king);
var_dump($enemy_king);
$king->attack($enemy_king);
$enemy_king->attack($king);
var_dump($king);
var_dump($enemy_king);
$king->attack($enemy_king);
$enemy_king->attack($king);
var_dump($king);
var_dump($enemy_king);
$king->attack($enemy_king);
$enemy_king->attack($king);
var_dump($king);
var_dump($enemy_king);
$king->attack($enemy_king);
$enemy_king->attack($king);
var_dump($king);
var_dump($enemy_king);
$king->attack($enemy_king);
$enemy_king->attack($king);
*/