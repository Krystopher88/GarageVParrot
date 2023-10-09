<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Services;
use App\Entity\Messaging;
use App\Entity\BrandVehicle;
use App\Entity\UsedVehicles;
use App\Entity\VisitorReview;
use App\Entity\OpeningShedule;
use App\Entity\TypeOfServices;
use App\Entity\FuelTypeVehicle;
use App\Entity\OptionsVehicles;
use App\Entity\TransmissionVehicle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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
            ->setTitle('Garage Vincent Parrot')
            ->setFaviconPath('pictures/logo_header.png');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->showEntityActionsInlined();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Administrations');
        yield MenuItem::linkToCrud('Horaire', 'fa-regular fa-clock', OpeningShedule::class);
        yield MenuItem::linkToCrud('Employés', 'fas fa-users', User::class);
        yield MenuItem::section('Vitrine');
        yield MenuItem::linkToCrud('Type de services', 'fas fa-list', TypeOfServices::class);
        yield MenuItem::linkToCrud(('Services'), 'fas fa-list', Services::class);
        yield MenuItem::section('Clientéles');
        yield MenuItem::linkToCrud('Avis', 'fa-solid fa-comment', VisitorReview::class);
        yield MenuItem::linkToCrud('Messagerie', 'fa-solid fa-envelope', Messaging::class);
        yield MenuItem::section('Véhicules d\'occasion');
        yield MenuItem::linkToCrud('Véhicules', 'fa-solid fa-car', UsedVehicles::class);
        yield MenuItem::subMenu('Base de données', 'fas fa-database')
            ->setSubItems([
                MenuItem::linkToCrud('Constructeur', 'fas fa-list', BrandVehicle::class),
                MenuItem::linkToCrud('Carburant', 'fas fa-list', FuelTypeVehicle::class),
                MenuItem::linkToCrud('Transmissions', 'fas fa-list', TransmissionVehicle::class),
                MenuItem::linkToCrud('Options', 'fas fa-list', OptionsVehicles::class),
            ]);

    }
}
