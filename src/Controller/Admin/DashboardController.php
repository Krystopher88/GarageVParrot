<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\BrandVehicle;
use App\Entity\FuelTypeVehicle;
use App\Entity\Messaging;
use App\Entity\OpeningShedule;
use App\Entity\PictureVehicles;
use App\Entity\UsedVehicles;
use App\Entity\VisitorReview;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\Stopwatch\Section;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GarageVParrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Horaire', 'fas fa-list', OpeningShedule::class);
        yield MenuItem::section('Ressource Humaines');
        yield MenuItem::linkToCrud('Employés', 'fas fa-users', User::class);
        yield MenuItem::section('Clientéles');
        yield MenuItem::linkToCrud('Avis', 'fas fa-users', VisitorReview::class);
        yield MenuItem::linkToCrud('Messagerie', 'fas fa-users', Messaging::class);
        yield MenuItem::section('Véhicules d\'occasion');
        yield MenuItem::linkToCrud('Véhicules', 'fas fa-list', UsedVehicles::class);
        yield MenuItem::linkToCrud('Photos', 'fas fa-list', PictureVehicles::class);
        yield MenuItem::linkToCrud('BrandVehicle', 'fas fa-list', BrandVehicle::class);
        yield MenuItem::linkToCrud('Carburant', 'fas fa-list', FuelTypeVehicle::class);
    }
}
