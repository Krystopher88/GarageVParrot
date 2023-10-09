<?php

namespace App\Controller\Admin;

use App\Entity\OpeningShedule;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OpeningSheduleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningShedule::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Horaire')
            ->setPageTitle(Crud::PAGE_EDIT, 'Horaire')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer de nouveau horaires');;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer');
            });
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('days', 'Jour');
        yield TimeField::new('hoursAmOpen', 'Heure d\'ouverture AM');
        yield TimeField::new('hoursAmClose', 'Heure de fermeture AM');
        yield TimeField::new('hoursPmOpen', 'Heure d\'ouverture PM');
        yield TimeField::new('hoursPmClose', 'Heure de fermeture PM');
    }
    
}
