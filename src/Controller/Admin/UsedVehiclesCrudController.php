<?php

namespace App\Controller\Admin;

use App\Entity\OptionsVehicles;
use App\Entity\UsedVehicles;
use App\Form\Type\VehicleImageType;
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



    public function configureFields(string $pageName): iterable
    {

        yield AssociationField::new('brandVehicle', 'Constructeur');
        yield TextField::new('model', 'Modéle');
        yield AssociationField::new('fuelTypeVehicle', 'Carburant');
        yield IntegerField::new('mileage', 'Kilométrage');
        yield DateField::new('dateOfCirculation', 'Date de mise en circulation');
        yield AssociationField::new('transmissionVehicle', 'Transmission');
        yield AssociationField::new('optionsVehicles', 'Options');
        yield IntegerField::new('price', 'Prix');
        yield CollectionField::new('pictureVehicles')
            ->setEntryType(VehicleImageType::class);
    }
}

