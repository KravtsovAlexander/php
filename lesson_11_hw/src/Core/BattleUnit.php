<?php

namespace Autoload\Homework\Core;

use Autoload\Homework\Core\Unit;
use Autoload\Homework\Core\AttackAble;

// BattleUnit наследуется от Unit
// BattleUnit - дочерний класс
// Unit - родительский класс
// BattleUnit наследует свойства и методы родителя

abstract class BattleUnit extends Unit implements AttackAble
{
    // внутри класса BattleUnit можно обратиться
    // к public и protected свойствам и методам родителя
    protected $attack;
    public function __construct($health, $agility, $attack)
    {
        parent::__construct($health, $agility); // вызов конструктора родителя
        if ($attack <= 0) {
            throw new \InvalidArgumentException('Ошибка атаки');
        }
        $this->attack = $attack;
    }

    public function rest()
    {
        $this->plus_health(floor($this->health * 0.25));
    }

    public function get_price() {
        return $this->price;
    }


    public static function get_unit(string $type)
    {
        $class_name = '\Autoload\Homework\\' . ucfirst(strtolower($type));
        if (!class_exists($class_name)) throw new \LogicException('Класса не существует');
        $unit = new $class_name(rand(1, 20), rand(1, 10), rand(1, 15));
        if (!is_subclass_of($unit, '\Autoload\Homework\Core\BattleUnit'))
            throw new \LogicException('Класс должен наследоваться от BattleUnit');
        return $unit;
    }
}
