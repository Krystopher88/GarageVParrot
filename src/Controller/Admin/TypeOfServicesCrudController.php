<?php

namespace App\Controller\Admin;

use App\Entity\TypeOfServices;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class TypeOfServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeOfServices::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');
        yield TextareaField::new('description');
        yield TextField::new('imageFile', 'Aperçu')->setFormType(VichImageType::class)->onlyOnForms();
        yield ImageField::new('imageName', 'Aperçu')->setBasePath('/uploads/typeOfServices')->onlyOnIndex();
    }
    
}
