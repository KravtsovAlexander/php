<?php

namespace Autoload\Homework;

use Autoload\Homework\Core\BattleUnit;
use Autoload\Homework\Core\Unit;

// King наследуется от Unit
// King - дочерний класс
// Unit - родительский класс
// King наследует свойства и методы родителя

class King extends Unit
{
    private $gold = 900;
    private $army = [];

    public function change_gold($gold)
    {
        $this->gold += $gold;
    }

    public function has_gold()
    {
        return $this->gold > 0;
    }

    public function rest()
    {
        $this->plus_health($this->health);
        $this->change_gold(floor($this->gold * 0.1));
    }

    public function recruit(string $type)
    {
        if ($this->has_gold()) {
            $unit = BattleUnit::get_unit($type);
            if ($this->gold < $unit->get_price()) return false;
            $this->army[] = $unit;
            $this->gold -= $unit->get_price();
        }
    }

    public function attack(King $enemy)
    {
        if (!$this->army) return false;
        foreach ($this->army as $unit) {
            if ($enemy->army) {
                $rand_unit = array_rand($enemy->army);
                $unit->attack($enemy->army[$rand_unit]);
                if (!$enemy->army[$rand_unit]->is_alive()) {
                    unset($enemy->army[$rand_unit]);
                }
            }
        }
    }
}
