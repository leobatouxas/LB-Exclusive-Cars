<?php

namespace App\Tests;

use App\Entity\Marque;
use App\Entity\Modele;
use PHPUnit\Framework\TestCase;

class MarqueUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Marque = new Marque();
        $Modele = new Modele();

        $Marque->setNom('nom')
                ->addModele($Modele);

        $this->assertTrue($Marque->getNom() === 'nom');
        $this->assertContains($Modele, $Marque->getModeles());
    }

    public function testIsFalse(): void
    {
        $Marque = new Marque();
        $Modele = new Modele();

        $Marque->setNom('nom')
        ->addModele($Modele);

        $this->assertFalse($Marque->getNom() === 'false');
        $this->assertNotContains(new Modele, $Marque->getModeles());
    }

    public function testIsEmpty(): void
    {
        $Marque = new Marque();

        $this->assertEmpty($Marque->getNom());
        $this->assertEmpty($Marque->getModeles());
    }
}
