<?php

namespace App\Controller\Admin;

use App\Entity\UsedVehicles;
use App\Entity\OptionsVehicles;
use App\Form\Type\VehicleImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsedVehiclesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UsedVehicles::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Véhicule d\'occasion')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer une annonce')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un véhicule');
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer une annonce');
            });
    }


    public function configureFields(string $pageName): iterable
    {

        yield AssociationField::new('brandVehicle', 'Constructeur');
        yield TextField::new('model', 'Modéle');
        yield AssociationField::new('fuelTypeVehicle', 'Carburant');
        yield IntegerField::new('mileage', 'Kilométrage');
        yield DateField::new('dateOfCirculation', 'Date de mise en circulation');
        yield AssociationField::new('transmissionVehicle', 'Transmission')
            ->onlyOnForms();
        yield AssociationField::new('optionsVehicles', 'Options');
        yield IntegerField::new('price', 'Prix (€)');
        yield CollectionField::new('pictureVehicles', 'Photos')
            ->setEntryType(VehicleImageType::class)
            ->onlyOnForms();
    }
}
