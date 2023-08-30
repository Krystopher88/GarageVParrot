<?php

namespace App\Controller\Admin;

use App\Entity\VisitorReview;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VisitorReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VisitorReview::class;
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
