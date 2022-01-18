<?php

namespace App\Tests;

use App\Entity\Garage;
use App\Entity\Utilisateur;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class GarageUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Garage = new Garage();
        $Utilisateur = new Utilisateur();
        $Vehicule = new Vehicule();

        $Garage->setNom('nom')
                ->setEmail('true@test.com')
                ->setDescription('description')
                ->setTelephone('telephone')
                ->setSiren('siren')
                ->setVille('ville')
                ->setCodePostal('codepostal')
                ->setAdresse('adresse')
                ->addUtilisateur($Utilisateur)
                ->addVehicule($Vehicule);

        $this->assertTrue($Garage->getNom() === 'nom');
        $this->assertTrue($Garage->getEmail() === 'true@test.com');
        $this->assertTrue($Garage->getDescription() === 'description');
        $this->assertTrue($Garage->getTelephone() === 'telephone');
        $this->assertTrue($Garage->getSiren() === 'siren');
        $this->assertTrue($Garage->getVille() === 'ville');
        $this->assertTrue($Garage->getCodePostal() === 'codepostal');
        $this->assertTrue($Garage->getAdresse() === 'adresse');
        $this->assertContains($Utilisateur, $Garage->getUtilisateurs());
        $this->assertContains($Vehicule, $Garage->getVehicules());
    }

    public function testIsFalse(): void
    {
        $Garage = new Garage();
        $Utilisateur1 = new Utilisateur();
        $Vehicule = new Vehicule();

        $Garage->setNom('nom')
                ->setEmail('true@test.com')
                ->setDescription('description')
                ->setTelephone('telephone')
                ->setSiren('siren')
                ->setVille('ville')
                ->setCodePostal('codepostal')
                ->setAdresse('adresse')
                ->addUtilisateur($Utilisateur1)
                ->addVehicule($Vehicule);

        $this->assertFalse($Garage->getNom() === 'false');
        $this->assertFalse($Garage->getEmail() === 'false@test.com');
        $this->assertFalse($Garage->getDescription() === 'false');
        $this->assertFalse($Garage->getTelephone() === 'false');
        $this->assertFalse($Garage->getSiren() === 'false');
        $this->assertFalse($Garage->getVille() === 'false');
        $this->assertFalse($Garage->getCodePostal() === 'false');
        $this->assertFalse($Garage->getAdresse() === 'false');
        $this->assertNotContains(new Utilisateur(),$Garage->getUtilisateurs());
        $this->assertNotContains(new Vehicule(),$Garage->getVehicules());
    }

    public function testIsEmpty(): void
    {
        $Garage = new Garage();

        $this->assertEmpty($Garage->getNom());
        $this->assertEmpty($Garage->getEmail());
        $this->assertEmpty($Garage->getDescription());
        $this->assertEmpty($Garage->getTelephone());
        $this->assertEmpty($Garage->getSiren());
        $this->assertEmpty($Garage->getVille());
        $this->assertEmpty($Garage->getCodePostal());
        $this->assertEmpty($Garage->getAdresse());
        $this->assertEmpty($Garage->getUtilisateurs());
        $this->assertEmpty($Garage->getVehicules());
    }
}
