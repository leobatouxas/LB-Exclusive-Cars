<?php

namespace App\Tests;

use App\Entity\Type;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class TypeUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Type = new Type();
        $Vehicule = new Vehicule();

        $Type->setNom('nom')
            ->addVehicule($Vehicule);


        $this->assertTrue($Type->getNom() === 'nom');
        $this->assertContains($Vehicule, $Type->getVehicules());

    }

    public function testIsFalse(): void
    {
        $Type = new Type();
        $Vehicule = new Vehicule();

        $Type->setNom('nom')
            ->addVehicule($Vehicule);

        $this->assertFalse($Type->getNom() === 'false');
        $this->assertNotContains(new Vehicule, $Type->getVehicules());

    }

    public function testIsEmpty(): void
    {
        $Type = new Type();

        $this->assertEmpty($Type->getNom());
        $this->assertEmpty($Type->getVehicules());
    }
}
