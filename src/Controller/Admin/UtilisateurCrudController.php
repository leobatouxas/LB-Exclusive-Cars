<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            ChoiceField::new('roles', 'Roles')
                    ->allowMultipleChoices()
                    ->autocomplete()
                    ->setChoices([  'Utilisateur' => 'ROLE_USER',
                                    'Employé' => 'ROLE_EMPLOYE',
                                    'Administrateur' => 'ROLE_ADMIN']
            ),
            AssociationField::new('garages')

        ];
    }
    
}
