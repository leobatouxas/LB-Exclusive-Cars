<?php

namespace App\Tests;

use App\Entity\BoiteVitesse;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class BoiteVitesseTypeTest extends TestCase
{
    public function testIsTrue(): void
    {
        $BoiteVitesse = new BoiteVitesse();
        $Vehicule = new Vehicule();

        $BoiteVitesse->setNom('nom')
                    ->addVehicule($Vehicule);

        $this->assertTrue($BoiteVitesse->getNom() === 'nom');
        $this->assertContains($Vehicule, $BoiteVitesse->getVehicules());

    }

    public function testIsFalse(): void
    {
        $BoiteVitesse = new BoiteVitesse();
        $Vehicule = new Vehicule();

        $BoiteVitesse->setNom('nom')
                    ->addVehicule($Vehicule);

        $this->assertNotContains(new Vehicule, $BoiteVitesse->getVehicules());

    }

    public function testIsEmpty(): void
    {
        $BoiteVitesse = new BoiteVitesse();

        $this->assertEmpty($BoiteVitesse->getNom());
        $this->assertEmpty($BoiteVitesse->getVehicules());
    }
}
