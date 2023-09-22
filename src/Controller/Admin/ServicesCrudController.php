<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }


    public function configureFields(string $pageName): iterable
    {   
        yield AssociationField::new('typeofservices','Type de service');
        yield TextField::new('title', 'Titre');
        yield TextareaField::new('description', 'Description');
        yield TextField::new('imageFile', 'Aperçu')->setFormType(VichImageType::class)->onlyOnForms();
        yield ImageField::new('imageName', 'Aperçu')->setBasePath('/uploads/services')->onlyOnIndex();
    }

}
