<?php

namespace App\Controller\Admin;

use App\Entity\PictureVehicles;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PictureVehiclesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PictureVehicles::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield NumberField::new('size');
        yield DateField::new('updateAt');
        yield AssociationField::new('usedVehicles');
    }
    
}
