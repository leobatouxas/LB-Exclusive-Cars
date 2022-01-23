<?php

namespace App\Tests;

use App\Entity\Garage;
use App\Entity\Utilisateur;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class UtilisateurUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Utilisateur = new Utilisateur();
        $Garage = new Garage();
        $Vehicule = new Vehicule();

        $Utilisateur->setEmail('true@test.com')
                    ->setPassword('password')
                    ->setPrenom('prenom')
                    ->setNom('nom')
                    ->setTelephone('telephone')
                    ->setAPropos('aPropos')
                    ->addGarage($Garage)
                    ->addVehicule($Vehicule)
        ;

        $this->assertTrue($Utilisateur->getEmail() === 'true@test.com');
        $this->assertTrue($Utilisateur->getPassword() === 'password');
        $this->assertTrue($Utilisateur->getPrenom() === 'prenom');
        $this->assertTrue($Utilisateur->getNom() === 'nom');
        $this->assertTrue($Utilisateur->getTelephone() === 'telephone');
        $this->assertTrue($Utilisateur->getAPropos() === 'aPropos');
        $this->assertContains($Garage, $Utilisateur->getGarages());
        $this->assertContains($Vehicule, $Utilisateur->getVehicules());
    }

    public function testIsFalse(): void
    {
        $Utilisateur = new Utilisateur();
        $Garage = new Garage();
        $Vehicule = new Vehicule();

        $Utilisateur->setEmail('true@test.com')
                ->setPassword('password')
                ->setPrenom('prenom')
                ->setNom('nom')
                ->setTelephone('telephone')
                ->setAPropos('aPropos')
                ->addGarage($Garage)
                ->addVehicule($Vehicule)
        ;


        $this->assertFalse($Utilisateur->getEmail() === 'false@test.com');
        $this->assertFalse($Utilisateur->getPassword() === 'false');
        $this->assertFalse($Utilisateur->getPrenom() === 'false');
        $this->assertFalse($Utilisateur->getNom() === 'false');
        $this->assertFalse($Utilisateur->getTelephone() === 'false');
        $this->assertFalse($Utilisateur->getAPropos() === 'false');
        $this->assertNotContains(new Garage, $Utilisateur->getGarages());
        $this->assertNotContains(new Garage, $Utilisateur->getVehicules());
    }

    public function testIsEmpty(): void
    {
        $Utilisateur = new Utilisateur();

        $this->assertEmpty($Utilisateur->getEmail());
        $this->assertEmpty($Utilisateur->getPrenom());
        $this->assertEmpty($Utilisateur->getNom());
        $this->assertEmpty($Utilisateur->getTelephone());
        $this->assertEmpty($Utilisateur->getAPropos());
        $this->assertEmpty($Utilisateur->getGarages());
        $this->assertEmpty($Utilisateur->getVehicules());
    }
}
