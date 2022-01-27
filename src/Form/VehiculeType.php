<?php

namespace App\Form;

use App\Form\PhotoType;
use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix')
            ->add('description')
            ->add('annee')
            ->add('kilometrage')
            ->add('couleur')
            ->add('puissanceFiscale')
            ->add('puissanceDin')
            ->add('enVente')
            ->add('modele')
            ->add('carburant')
            ->add('boiteVitesse')
            ->add('type')
            ->add('nbPorte')
            ->add('critAir')
            ->add('garage')
            ->add('photos', CollectionType::class, [
                'entry_type' => PhotoType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
