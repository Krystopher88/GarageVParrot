<?php

namespace App\Controller;


use App\Service\ContactFormService;
use App\Service\VehicleFormService;
use App\Form\FilterUsedvehiclesType;
use App\Repository\ServicesRepository;
use App\Repository\UsedVehiclesRepository;
use App\Repository\OpeningSheduleRepository;
use App\Repository\TypeOfServicesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $contactFormService;
    private $vehicleFormService;

    public function __construct(ContactFormService $contactFormService, VehicleFormService $vehicleFormService)
    {
        $this->contactFormService = $contactFormService;
        $this->vehicleFormService = $vehicleFormService;
    }

    #[Route('/', name: 'app_home', methods: ['GET', 'POST'])]
    public function index(
        OpeningSheduleRepository $openingSheduleRepository,
        UsedVehiclesRepository $usedVehiclesRepository,
        TypeOfServicesRepository $typeOfServicesRepository,
        Request $request,
    ): Response {
        $formView = $this->contactFormService->handleContactForm($request);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'typeOfServices' => $typeOfServicesRepository->findAll(),
            'openingShedules' => $openingSheduleRepository->findAll(),
            'formView' => $formView,
            'usedVehiclesCards' => $usedVehiclesRepository->findCardUsedVehicles(),
        ]);
    }

    #[Route('/usedvehicle/{id}', name: 'app_usedVehicle', methods: ['GET', 'POST'])]
    public function show(
        UsedVehiclesRepository $usedVehiclesRepository,
        OpeningSheduleRepository $openingSheduleRepository,
        Request $request
    ): Response {

        $formView = $this->contactFormService->handleContactForm($request);
        $formViewVehicle = $this->vehicleFormService->handleUsedVehicleForm($request);

        $id = $request->attributes->get('id');
        $usedVehicle = $usedVehiclesRepository->findOneBy(['id' => $id]);
        $picturesVehicles = $usedVehicle->getPictureVehicles();
        $optionsVehicles = $usedVehicle->getOptionsVehicles();

        return $this->render('home/usedvehicle.html.twig', [
            'controller_name' => 'HomeController',
            'formView' => $formView,
            'formViewVehicle' => $formViewVehicle,
            'openingShedules' => $openingSheduleRepository->findAll(),
            'usedVehicles' => $usedVehicle,
            'picturesVehicles' => $picturesVehicles,
            'optionsVehicles' => $optionsVehicles,
        ]);
    }

    #[Route('/usedvehicles', name: 'app_usedVehicles', methods: ['GET', 'POST'])]
    public function showAllVehicles(
        UsedVehiclesRepository $usedVehiclesRepository,
        OpeningSheduleRepository $openingSheduleRepository,
        Request $request
    ): Response {
        $formView = $this->contactFormService->handleContactForm($request);
    
        $formFilterVehicles = $this->createForm(FilterUsedvehiclesType::class);
        $formFilterVehicles->handleRequest($request);
    
        $searchData = [
            'brandVehicle' => $formFilterVehicles->get('brandVehicle')->getData(),
            'fuelTypeVehicle' => $formFilterVehicles->get('fuelTypeVehicle')->getData(),
            'transmissionVehicle' => $formFilterVehicles->get('transmissionVehicle')->getData(),
        ];
    
        $minPrice = $formFilterVehicles->get('minPrice')->getData();
        $maxPrice = $formFilterVehicles->get('maxPrice')->getData();
        $minMileage = $formFilterVehicles->get('minMileage')->getData();
        $maxMileage = $formFilterVehicles->get('maxMileage')->getData();
    
        // Effectuez la recherche en utilisant les valeurs minPrice et maxPrice
        $usedVehiclesCards = $usedVehiclesRepository->findSearchVehicles($searchData, $minPrice, $maxPrice, $minMileage, $maxMileage);
    
        return $this->render('home/usedvehicles.html.twig', [
            'controller_name' => 'HomeController',
            'formFilterVehicles' => $formFilterVehicles->createView(),
            'formView' => $formView,
            'openingShedules' => $openingSheduleRepository->findAll(),
            'usedVehiclesCards' => $usedVehiclesCards,
        ]);
    }
    
    

    #[Route('/mecanique', name: 'app_mecanique', methods: ['GET', 'POST'])]
    public function mecanique(
        OpeningSheduleRepository $openingSheduleRepository,
        ServicesRepository $servicesRepository,
        Request $request
    ): Response {
        $formView = $this->contactFormService->handleContactForm($request);

        return $this->render('home/mecanique.html.twig', [
            'controller_name' => 'HomeController',
            'formView' => $formView,
            'openingShedules' => $openingSheduleRepository->findAll(),
            'services' => $servicesRepository->findAll(),
        ]);
    }

    #[Route('/carrosserie', name: 'app_carrosserie', methods: ['GET', 'POST'])]
    public function carrosserie(
        OpeningSheduleRepository $openingSheduleRepository,
        ServicesRepository $servicesRepository,
        Request $request
    ): Response {
        $formView = $this->contactFormService->handleContactForm($request);

        return $this->render('home/carrosserie.html.twig', [
            'controller_name' => 'HomeController',
            'formView' => $formView,
            'openingShedules' => $openingSheduleRepository->findAll(),
            'services' => $servicesRepository->findAll(),
        ]);
    }
}
