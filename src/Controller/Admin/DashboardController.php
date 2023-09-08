<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Messaging;
use App\Entity\BrandVehicle;
use App\Entity\UsedVehicles;
use App\Entity\VisitorReview;
use App\Entity\OpeningShedule;
use App\Entity\FuelTypeVehicle;
use App\Entity\OptionsVehicles;
use App\Entity\TransmissionVehicle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage Vincent Parrot');
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
        yield MenuItem::subMenu('Base de données', 'fas fa-database')
            ->setSubItems([
                MenuItem::linkToCrud('BrandVehicle', 'fas fa-list', BrandVehicle::class),
                MenuItem::linkToCrud('Carburant', 'fas fa-list', FuelTypeVehicle::class),
                MenuItem::linkToCrud('Transmission', 'fas fa-list', TransmissionVehicle::class),
                MenuItem::linkToCrud('Options', 'fas fa-list', OptionsVehicles::class),
            ]);

    }
}
