<?php

namespace App\Controller\Admin;

use App\Entity\TypeOfServices;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeOfServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeOfServices::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Catégorie de Services')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une catégorie')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer une catégorie');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
            return $action->setLabel('Créer une catégorie');
        });
    }
    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title', 'Catégorie');
        yield TextareaField::new('description');
        yield TextField::new('imageFile', 'Aperçu')->setFormType(VichImageType::class)->onlyOnForms();
        yield ImageField::new('imageName', 'Aperçu')->setBasePath('/uploads/typeOfServices')->onlyOnIndex();
    }
    
}
