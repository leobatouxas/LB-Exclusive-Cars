<?php

namespace App\Tests;

use App\Entity\CritAir;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class CritAirUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $CritAir = new CritAir();
        $Vehicule = new Vehicule();

        $CritAir->setNom('nom')
                ->addVehicule($Vehicule);

        $this->assertTrue($CritAir->getNom() === 'nom');
        $this->assertContains($Vehicule, $CritAir->getVehicules());

    }

    public function testIsFalse(): void
    {
        $CritAir = new CritAir();
        $Vehicule = new Vehicule();

        $CritAir->setNom('nom')
                ->addVehicule($Vehicule);

        $this->assertFalse($CritAir->getNom() === 'false');
        $this->assertNotContains(new Vehicule, $CritAir->getVehicules());

    }

    public function testIsEmpty(): void
    {
        $CritAir = new CritAir();

        $this->assertEmpty($CritAir->getNom());
        $this->assertEmpty($CritAir->getVehicules());
    }
}
