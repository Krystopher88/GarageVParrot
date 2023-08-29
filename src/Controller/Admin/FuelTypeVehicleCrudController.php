<?php

namespace App\Controller\Admin;

use App\Entity\FuelTypeVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FuelTypeVehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FuelTypeVehicle::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
