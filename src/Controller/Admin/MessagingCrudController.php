<?php

namespace App\Controller\Admin;

use App\Entity\Messaging;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MessagingCrudController extends AbstractCrudController
{



    public static function getEntityFqcn(): string
    {
        return Messaging::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Messagerie')
            ->setPageTitle(Crud::PAGE_EDIT, 'Message');
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Consulter');
            })
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('subject', 'Sujet')
            ->setDisabled();
        yield TextField::new('firstName', 'Prénom')
            ->setDisabled();
        yield TextField::new('lastName', 'Nom')
            ->setDisabled();
        yield TextField::new('email', 'Email')
            ->onlyOnForms()
            ->setDisabled();;
        yield TextField::new('phoneNumber', 'Téléphone')
            ->onlyOnForms()
            ->setDisabled();
        yield TextareaField::new('message', 'Message')
            ->onlyOnForms()
            ->setDisabled();
    }
}
