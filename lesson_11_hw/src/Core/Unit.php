<?php

namespace Autoload\Homework\Core;
use Autoload\Homework\Core\RestAble;

abstract class Unit implements RestAble
{
    // protected свойства и методы доступны
    // внутри текущего класса и внутри дочерних классов
    protected $health;
    protected $agility;
    // private свойства и методы доступны внутри текущего класса
    private $max_health;

    public function __construct(int $health, int $agility)
    {
        if ($health <= 0 || $agility <= 0) {
            throw new \InvalidArgumentException('Ошибка Unit');
        }
        $this->health = $health;
        $this->max_health = $health;
        $this->agility = $agility;
    }


    // public свойства и методы доступны в любом участке программы
    public function is_alive()
    {
        return $this->health > 0;
    }
    public function minus_health(int $points)
    {
        if ($this->is_alive()) {
            $this->health -= $points;
            if (!$this->is_alive()) $this->health = 0;
        }
    }
    public function plus_health(int $points)
    {
        if ($this->is_alive()) {
            $this->health += $points;
            if ($this->health > $this->max_health) $this->health = $this->max_health;
        }
    }
}
