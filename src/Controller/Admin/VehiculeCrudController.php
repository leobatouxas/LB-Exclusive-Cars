<?php

namespace App\Controller\Admin;

use App\Entity\Vehicule;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class VehiculeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicule::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            NumberField::new('prix'),
            TextareaField::new('description')->hideOnIndex(),
            IntegerField::new('annee'),
            IntegerField::new('kilometrage'),
            TextField::new('couleur')->hideOnIndex(),
            AssociationField::new('modele')->hideOnIndex(),
            AssociationField::new('carburant')->hideOnIndex(),
            AssociationField::new('boiteVitesse')->hideOnIndex(),
            AssociationField::new('type')->hideOnIndex(),
            AssociationField::new('nbPorte')->hideOnIndex(),
            AssociationField::new('critAir')->hideOnIndex(),
            IntegerField::new('puissanceFiscale')->hideOnIndex(),
            IntegerField::new('puissanceDin')->hideOnIndex(),
            TextField::new('ville')->hideOnIndex(),
            TextField::new('codePostal')->hideOnIndex(),
            TextField::new('adresse'),
            BooleanField::new('enVente')->hideOnIndex(),
            AssociationField::new('garage'),
            CollectionField::new('photos')->setFormType(VichImageType::class),
            ImageField::new('photos.nom')->setBasePath('/uploads/vehicules')
        ];
    }
}
