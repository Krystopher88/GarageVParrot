<?php

namespace App\Controller\Admin;

use App\Entity\TransmissionVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TransmissionVehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TransmissionVehicle::class;
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
