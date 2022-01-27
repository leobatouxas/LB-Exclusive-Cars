<?php

namespace App\Tests;

use App\Entity\Photo;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\File\File;

class PhotoUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Photo = new Photo();
        $Vehicule = new Vehicule();

        $Photo->setImageName('nom');
        $Photo->setVehicule($Vehicule);


        $this->assertTrue($Photo->getImageName() === 'nom');
        $this->assertTrue($Photo->getVehicule() === $Vehicule);

    }

    public function testIsFalse(): void
    {
        $Photo = new Photo();
        $Vehicule = new Vehicule();

        $Photo->setImageName('nom');
        $Photo->setVehicule($Vehicule);

        $this->assertFalse($Photo->getImageName() === 'false');
        $this->assertFalse($Photo->getVehicule() === new Vehicule());

    }

    public function testIsEmpty(): void
    {
        $Photo = new Photo();

        $this->assertEmpty($Photo->getImageName());
        $this->assertEmpty($Photo->getVehicule());
    }
}
