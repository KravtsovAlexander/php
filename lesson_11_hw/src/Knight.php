<?php

namespace Autoload\Homework;

use Autoload\Homework\Core\BattleUnit;
use Autoload\Homework\Core\Unit;

// Knight наследуется от BattleUnit
// Knight - дочерний класс
// BattleUnit - родительский класс
// Knight наследует свойства и методы родителя


class Knight extends BattleUnit
{
    protected $price = 300;
    public function __construct($health, $agility, $attack)
    {
        parent::__construct($health, $agility, $attack); // вызов конструктора родителя
    }

    public function attack(Unit $enemy)
    {
        if ($enemy->is_alive() && $this->is_alive()) {
            if ($enemy->health < $this->attack) $this->plus_health($enemy->health);
            $enemy->minus_health($this->attack);
        }
    }
}
