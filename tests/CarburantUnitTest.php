<?php

namespace App\Tests;

use App\Entity\Carburant;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class CarburantUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Carburant = new Carburant();
        $Vehicule = new Vehicule();

        $Carburant->setNom('nom')
                    ->addVehicule($Vehicule);


        $this->assertTrue($Carburant->getNom() === 'nom');
        $this->assertContains($Vehicule, $Carburant->getVehicules());

    }

    public function testIsFalse(): void
    {
        $Carburant = new Carburant();
        $Vehicule = new Vehicule();

        $Carburant->setNom('nom')
                ->addVehicule($Vehicule);

        $this->assertFalse($Carburant->getNom() === 'false');
        $this->assertContains($Vehicule, $Carburant->getVehicules());

    }

    public function testIsEmpty(): void
    {
        $Carburant = new Carburant();

        $this->assertEmpty($Carburant->getNom());
        $this->assertEmpty($Carburant->getVehicules());
    }
}
