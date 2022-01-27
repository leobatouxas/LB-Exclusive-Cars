<?php

namespace App\Tests;

use App\Entity\BoiteVitesse;
use App\Entity\Carburant;
use App\Entity\CritAir;
use App\Entity\Garage;
use App\Entity\Modele;
use App\Entity\NbPorte;
use App\Entity\Photo;
use App\Entity\Type;
use App\Entity\Utilisateur;
use App\Entity\Vehicule;
use DateTime;
use PHPUnit\Framework\TestCase;

class VehiculeUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $Vehicule = new Vehicule();
        $Date = new DateTime();
        $Modele = new Modele();
        $Garage = new Garage();
        $Carburant = new Carburant();
        $BoiteVitesse = new BoiteVitesse();
        $Type = new Type();
        $NbPorte = new NbPorte();
        $CritAir = new CritAir();
        $Photo = new Photo();
        $Utilisateur = new Utilisateur();

        $Vehicule->setNom('true')
                    ->setPrix('1,1')
                    ->setDescription('true')
                    ->setAnnee(1)
                    ->setKilometrage(1)
                    ->setCouleur('true')
                    ->setPuissanceFiscale(1)
                    ->setPuissanceDin(1)
                    ->setDateAnnonce($Date)
                    ->setEnVente(true)
                    ->setSlug('true')  
                    ->setModele($Modele)
                    ->setGarage($Garage)
                    ->setCarburant($Carburant)
                    ->setBoiteVitesse($BoiteVitesse)
                    ->setType($Type)
                    ->setNbPorte($NbPorte)
                    ->setCritAir($CritAir)
                    ->addPhoto($Photo)
                    ->setUtilisateur($Utilisateur)
        ;

        $this->assertTrue($Vehicule->getNom() === 'true');
        $this->assertTrue($Vehicule->getPrix() === '1,1');
        $this->assertTrue($Vehicule->getDescription() === 'true');
        $this->assertTrue($Vehicule->getAnnee() === 1);
        $this->assertTrue($Vehicule->getKilometrage() === 1);
        $this->assertTrue($Vehicule->getCouleur() === 'true');
        $this->assertTrue($Vehicule->getPuissanceFiscale() === 1);
        $this->assertTrue($Vehicule->getPuissanceDin() === 1);
        $this->assertTrue($Vehicule->getDateAnnonce() === $Date);
        $this->assertTrue($Vehicule->getEnVente() === true);
        $this->assertTrue($Vehicule->getSlug() === 'true');
        $this->assertTrue($Vehicule->getModele() === $Modele);
        $this->assertTrue($Vehicule->getGarage() === $Garage);
        $this->assertTrue($Vehicule->getCarburant() === $Carburant);
        $this->assertTrue($Vehicule->getBoiteVitesse() === $BoiteVitesse);
        $this->assertTrue($Vehicule->getType() === $Type);
        $this->assertTrue($Vehicule->getNbPorte() === $NbPorte);
        $this->assertTrue($Vehicule->getCritAir() === $CritAir);
        $this->assertContains($Photo, $Vehicule->getPhotos());
        $this->assertTrue($Vehicule->getUtilisateur() === $Utilisateur);

    }

    public function testIsFalse(): void
    {
        $Vehicule = new Vehicule();

        $Vehicule->setNom('true')
                    ->setPrix('1.1')
                    ->setDescription('true')
                    ->setAnnee(1)
                    ->setKilometrage(1)
                    ->setCouleur('true')
                    ->setPuissanceFiscale(1)
                    ->setPuissanceDin(1)
                    ->setDateAnnonce(new DateTime())
                    ->setEnVente(true)
                    ->setSlug('true')  
                    ->setModele(new Modele)
                    ->setGarage(new Garage)
                    ->setCarburant(new Carburant)
                    ->setBoiteVitesse(new BoiteVitesse)
                    ->setType(new Type)
                    ->setNbPorte(new NbPorte)
                    ->setCritAir(new CritAir)
                    ->addPhoto(new Photo)
                    ->setUtilisateur(new Utilisateur)
        ;

        $this->assertFalse($Vehicule->getNom() === 'false');
        $this->assertFalse($Vehicule->getPrix() === '0.0');
        $this->assertFalse($Vehicule->getDescription() === 'false');
        $this->assertFalse($Vehicule->getAnnee() === 0);
        $this->assertFalse($Vehicule->getKilometrage() === 0);
        $this->assertFalse($Vehicule->getCouleur() === 'false');
        $this->assertFalse($Vehicule->getPuissanceFiscale() === 0);
        $this->assertFalse($Vehicule->getPuissanceDin() === 0);
        $this->assertFalse($Vehicule->getDateAnnonce() === new DateTime());
        $this->assertFalse($Vehicule->getEnVente() === false);
        $this->assertFalse($Vehicule->getSlug() === 'false');
        $this->assertFalse($Vehicule->getModele() === new Modele);
        $this->assertFalse($Vehicule->getGarage() === new Garage);
        $this->assertFalse($Vehicule->getCarburant() === new Carburant);
        $this->assertFalse($Vehicule->getBoiteVitesse() === new BoiteVitesse);
        $this->assertFalse($Vehicule->getType() === new Type);
        $this->assertFalse($Vehicule->getNbPorte() === new NbPorte);
        $this->assertFalse($Vehicule->getCritAir() === new CritAir);
        $this->assertNotContains(new Photo,$Vehicule->getPhotos());
        $this->assertFalse($Vehicule->getUtilisateur() === new Utilisateur);

    }

    public function testIsEmpty(): void
    {
        $Vehicule = new Vehicule();

        $this->assertEmpty($Vehicule->getNom());
        $this->assertEmpty($Vehicule->getPrix());
        $this->assertEmpty($Vehicule->getDescription());
        $this->assertEmpty($Vehicule->getAnnee());
        $this->assertEmpty($Vehicule->getKilometrage());
        $this->assertEmpty($Vehicule->getCouleur());
        $this->assertEmpty($Vehicule->getPuissanceFiscale());
        $this->assertEmpty($Vehicule->getPuissanceDin());
        $this->assertEmpty($Vehicule->getDateAnnonce());
        $this->assertEmpty($Vehicule->getEnVente());
        $this->assertEmpty($Vehicule->getSlug());
        $this->assertEmpty($Vehicule->getModele());
        $this->assertEmpty($Vehicule->getGarage());
        $this->assertEmpty($Vehicule->getCarburant());
        $this->assertEmpty($Vehicule->getBoiteVitesse());
        $this->assertEmpty($Vehicule->getType());
        $this->assertEmpty($Vehicule->getNbPorte());
        $this->assertEmpty($Vehicule->getCritAir());
        $this->assertEmpty($Vehicule->getPhotos());
        $this->assertEmpty($Vehicule->getUtilisateur());
    }
}
