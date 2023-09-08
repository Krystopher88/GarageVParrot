<?php

namespace App\Controller\Admin;

use App\Entity\BrandVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BrandVehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BrandVehicle::class;
    }
}
