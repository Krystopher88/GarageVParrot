<?php

namespace App\Controller\Admin;

use App\Entity\BrandVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BrandVehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BrandVehicle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('brand', 'Constructeur');
    }
}
