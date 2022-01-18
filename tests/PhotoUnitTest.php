<?php

namespace App\Tests;

use App\Entity\Photo;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class PhotoUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Photo = new Photo();
        $Vehicule = new Vehicule();

        $Photo->setNom('nom')
            ->setVehicule($Vehicule);


        $this->assertTrue($Photo->getNom() === 'nom');
        $this->assertTrue($Photo->getVehicule() === $Vehicule);

    }

    public function testIsFalse(): void
    {
        $Photo = new Photo();
        $Vehicule = new Vehicule();

        $Photo->setNom('nom')
            ->setVehicule($Vehicule);

        $this->assertFalse($Photo->getNom() === 'false');
        $this->assertFalse($Photo->getVehicule() === new Vehicule());

    }

    public function testIsEmpty(): void
    {
        $Photo = new Photo();

        $this->assertEmpty($Photo->getNom());
        $this->assertEmpty($Photo->getVehicule());
    }
}
