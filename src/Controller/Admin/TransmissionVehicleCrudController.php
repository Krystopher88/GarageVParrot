<?php

namespace App\Controller\Admin;

use App\Entity\TransmissionVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TransmissionVehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TransmissionVehicle::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Transmission')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer une nouvelle transmission');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
            return $action->setLabel('Créer une transmission');
        });
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('types', 'Transmission');
    }
    
}
