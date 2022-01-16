<?php

namespace App\Tests;

use App\Entity\Modele;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class ModeleUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Modele = new Modele();
        $Vehicule = new Vehicule();

        $Modele->setNom('nom')
                ->addVehicule($Vehicule);

        $this->assertTrue($Modele->getNom() === 'nom');
        $this->assertContains($Vehicule, $Modele->getVehicules());
    }

    public function testIsFalse(): void
    {
        $Modele = new Modele();
        $Vehicule = new Vehicule();

        $Modele->setNom('nom')
                ->addVehicule($Vehicule);

        $this->assertFalse($Modele->getNom() === 'false');
        $this->assertNotContains(new Vehicule(), $Modele->getVehicules());
    }

    public function testIsEmpty(): void
    {
        $Modele = new Modele();

        $this->assertEmpty($Modele->getNom());
        $this->assertEmpty($Modele->getVehicules());
    }
}
