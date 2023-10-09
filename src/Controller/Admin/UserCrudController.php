<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Employés')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer un nouvel employé');
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('username', 'Identifiant');
        yield TextField::new(propertyName: 'plainPassword')->hideOnIndex();
        yield ChoiceField::new('roles', 'Rôles')
            ->setChoices([
                'Administrateur' => 'ROLE_ADMIN',
                'Employé' => 'ROLE_USER',
            ])
            ->allowMultipleChoices();
        yield TextField::new('lastName', 'Nom');
        yield TextField::new('firstName', 'Prénom');
    }
    
}
