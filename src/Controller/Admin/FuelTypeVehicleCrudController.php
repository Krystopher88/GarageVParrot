<?php

namespace App\Controller\Admin;

use App\Entity\FuelTypeVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FuelTypeVehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FuelTypeVehicle::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Type de carburant')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer un nouveau type de carburant');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
            return $action->setLabel('Créer un type de carburant');
        });
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('fuelType', 'Type de carburant');
    }
    
}
