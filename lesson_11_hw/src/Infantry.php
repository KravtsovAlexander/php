<?php
namespace Autoload\Homework;
use Autoload\Homework\Core\BattleUnit;
use Autoload\Homework\Core\Unit;

// Infantry наследуется от BattleUnit
// Infantry - дочерний класс
// BattleUnit - родительский класс
// Infantry наследует свойства и методы родителя

class Infantry extends BattleUnit {
    protected $price = 100;
    public function __construct($health, $agility, $attack)
    {
        parent::__construct($health, $agility, $attack); // вызов конструктора родителя
    }

    // переопределение метода родителя
    public function plus_health(int $points)
    {
        parent::plus_health($points + 2); // вызов метода родителя
    }

    public function attack(Unit $enemy)
    {
        if($enemy->is_alive() && $this->is_alive()) {
            $enemy->minus_health($this->attack);
        }
    }

}