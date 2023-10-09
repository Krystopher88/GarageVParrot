<?php

namespace App\Controller\Admin;

use App\Entity\BrandVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BrandVehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BrandVehicle::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Constructeur')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer un nouveau constructeur');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
            return $action->setLabel('Créer une catégorie');
        });
    }
    

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('brand', 'Constructeur');
    }
}
