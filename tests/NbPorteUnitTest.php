<?php

namespace App\Tests;

use App\Entity\NbPorte;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class NbPorteUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $NbPorte = new NbPorte();
        $Vehicule = new Vehicule();

        $NbPorte->setNom('nom')
                ->addVehicule($Vehicule);

        $this->assertTrue($NbPorte->getNom() === 'nom');
        $this->assertContains($Vehicule, $NbPorte->getVehicules());
    }

    public function testIsFalse(): void
    {
        $NbPorte = new NbPorte();
        $Vehicule = new Vehicule();

        $NbPorte->setNom('nom')
                ->addVehicule($Vehicule);

        $this->assertFalse($NbPorte->getNom() === 'false');
        $this->assertNotContains(new Vehicule, $NbPorte->getVehicules());
    }

    public function testIsEmpty(): void
    {
        $NbPorte = new NbPorte();

        $this->assertEmpty($NbPorte->getNom());
        $this->assertEmpty($NbPorte->getVehicules());
    }
}
