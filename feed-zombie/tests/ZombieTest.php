<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 31/10/17
 * Time: 20:35
 */

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Zombie;
use App\Banane;
use App\Ail;
use App\Chocolat;
use App\Pizza;
use App\Poivron;

class ZombieTest extends TestCase
{
    public function test_nourrir_zombie_avec_banane()
    {
        $zombie = new Zombie();
        $aliment = new Banane();

        $this->assertEquals(4, $zombie->getBras() + $zombie->getJambes());

        $zombie->nourrir($aliment);

        $this->assertEquals(3, $zombie->getBras() + $zombie->getJambes());
    }

    public function test_nourrir_zombie_avec_ail()
    {
        $zombie = new Zombie();
        $aliment = new Ail();
        $this->assertEquals(4, $zombie->getBras() + $zombie->getJambes());

        $zombie->nourrir($aliment);

        $this->assertEquals(3, $zombie->getBras() + $zombie->getJambes());
    }

    public function test_nourrir_zombie_avec_poivron()
    {
        $zombie = new Zombie();
        $aliment = new Poivron();

        $this->assertEquals(4, $zombie->getBras() + $zombie->getJambes());

        $zombie->nourrir($aliment);

        $this->assertEquals(3, $zombie->getBras() + $zombie->getJambes());
    }

    public function test_nourrir_zombie_avec_Chocolat()
    {
        $zombie = new Zombie();
        $aliment = new Chocolat();

        $this->assertEquals(4, $zombie->getBras() + $zombie->getJambes());

        $zombie->nourrir($aliment);

        $this->assertEquals(4, $zombie->getBras() + $zombie->getJambes());
    }

    public function test_nourrir_zombie_avec_pizza()
    {
        $zombie = new Zombie();
        $alimentMauvais = new Banane();
        $alimentBon = new Pizza();

        $this->assertEquals(4, $zombie->getBras() + $zombie->getJambes());

        $zombie->nourrir($alimentMauvais);

        $this->assertEquals(3, $zombie->getBras() + $zombie->getJambes());

        $zombie->nourrir($alimentBon);

        $this->assertEquals(4, $zombie->getBras() + $zombie->getJambes());

    }
}