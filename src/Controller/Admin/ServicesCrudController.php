<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Services')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un service')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer un service');
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer un service');
            });
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
