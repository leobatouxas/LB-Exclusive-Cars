<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Type;
use App\Entity\Garage;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Vehicule;
use App\Entity\Carburant;
use App\Entity\Utilisateur;
use App\Entity\BoiteVitesse;
use App\Entity\CritAir;
use App\Entity\NbPorte;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        // Création utilisateur 
        $utilisateur = new Utilisateur();
        $utilisateur->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setAPropos($faker->text());

        $password = $this->hasher->hashPassword($utilisateur, 'password');
        $utilisateur->setPassword($password);
        $manager->persist($utilisateur);

        //Création Garage
        $garage = new Garage();
        $garage->setNom($faker->word())
            ->setEmail($faker->email())
            ->setDescription($faker->paragraph())
            ->setTelephone($faker->phoneNumber())
            ->setSiren('362 521 879')
            ->setVille($faker->word)
            ->setCodePostal($faker->randomNumber(5, true))
            ->setAdresse($faker->words(3, true))
            ->addUtilisateur($utilisateur);
        $manager->persist($garage);

        //Création Marque
        $marques = [];
        for ($i = 0; $i < 5; $i++) {
            $marque = new Marque();
            $marque->setNom($faker->randomElement(['Bmw', 'Audi', 'Mercedes']));
            array_push($marques, $marque);
            $manager->persist($marque);
        }

        //Création Modèle
        $modeles = [];
        for ($i = 0; $i < 5; $i++) {
            $modele = new Modele();
            $modele->setNom($faker->word());
            $modele->setMarque($marques[$i]);
            array_push($modeles, $modele);
            $manager->persist($modele);
        }

        //Création Carburant
        $carburants = [];
        for ($i = 0; $i < 1; $i++) {
            $carburant = new Carburant();
            $carburant->setNom($faker->randomElement(['Essence', 'Diesel']));
            array_push($carburants, $carburant);
            $manager->persist($carburant);
        }

        //Création Boite Vitesse
        $boiteVitesses = [];
        for ($i = 0; $i < 2; $i++) {
            $boiteVitesse = new BoiteVitesse();
            $boiteVitesse->setNom($faker->randomElement(['Manuel', 'Automatique']));
            array_push($boiteVitesses, $boiteVitesse);
            $manager->persist($boiteVitesse);
        }

        //Création Type
        $Types = [];
        for ($i = 0; $i < 2; $i++) {
            $type = new Type();
            $type->setNom($faker->randomElement(['Berline', 'Cabriolet', 'Break']));
            array_push($Types, $type);
            $manager->persist($type);
        }

        //Création NbPorte
        $NbPortes = [];
        for ($i = 0; $i < 2; $i++) {
            $NbPorte = new NbPorte();
            $NbPorte->setNom($faker->randomElement(['3', '5', '5 ou plus']));
            array_push($NbPortes, $NbPorte);
            $manager->persist($NbPorte);
        }

        //Création Critair
        $Critairs = [];
        for ($i = 0; $i < 2; $i++) {
            $CritAir = new CritAir();
            $CritAir->setNom($faker->randomElement(['Crit\'air 3', 'Crit\'air 2', 'Crit\'air 1']));
            array_push($Critairs, $CritAir);
            $manager->persist($CritAir);
        }

        //Création Véhicule
        for ($i = 0; $i < 75; $i++) {
            $vehicule = new Vehicule();
            $vehicule->setNom($faker->word())
                ->setPrix($faker->randomFloat(2, 1099, 199000))
                ->setDescription($faker->paragraph())
                ->setAnnee($faker->randomElement([2002, 2005, 2012, 2019, 2021, 2018, 2017, 2016, 2015]))
                ->setKilometrage($faker->randomNumber(6, true))
                ->setCouleur($faker->word())
                ->setPuissanceFiscale($faker->randomNumber(2))
                ->setPuissanceDin($faker->randomNumber(3))
                ->setDateAnnonce($faker->dateTimeBetween('-3 week', 'now'))
                ->setEnVente(true)
                ->setSlug($faker->slug)
                ->setGarage($garage)
                ->setUtilisateur($utilisateur)
                ->setModele($modeles[array_rand($modeles, 1)])
                ->setCarburant($carburants[array_rand($carburants, 1)])
                ->setBoiteVitesse($boiteVitesses[array_rand($boiteVitesses, 1)])
                ->setType($Types[array_rand($Types, 1)])
                ->setNbPorte($NbPortes[array_rand($NbPortes, 1)])
                ->setCritAir($Critairs[array_rand($Critairs, 1)]);
            $manager->persist($vehicule);
        }
        $manager->flush();
    }
}
