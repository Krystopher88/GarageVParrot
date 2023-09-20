<?php

namespace App\Controller;

use App\Service\FilterUsedVehiclesFormService;
use App\Service\ContactFormService;
use App\Repository\UsedVehiclesRepository;
use App\Repository\OpeningSheduleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $contactFormService;

    public function __construct(ContactFormService $contactFormService)
    {
        $this->contactFormService = $contactFormService;
    }

    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(OpeningSheduleRepository $openingSheduleRepository, UsedVehiclesRepository $usedVehiclesRepository, Request $request): Response
    {
        $formView = $this->contactFormService->handleContactForm($request);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'openingShedules' => $openingSheduleRepository->findAll(),
            'formView' => $formView,
            'usedVehiclesCards' => $usedVehiclesRepository->findCardUsedVehicles(),
        ]);
    }

    #[Route('/usedvehicle/{id}', name: 'app_usedVehicle', methods: ['GET'])]
    public function show(
        UsedVehiclesRepository $usedVehiclesRepository, 
        OpeningSheduleRepository $openingSheduleRepository, 
        Request $request
        ): Response
    {

        $formView = $this->contactFormService->handleContactForm($request);

        $id = $request->attributes->get('id');
        $usedVehicle = $usedVehiclesRepository->findOneBy(['id' => $id]);
        $picturesVehicles = $usedVehicle->getPictureVehicles();
        $optionsVehicles = $usedVehicle->getOptionsVehicles();

        return $this->render('home/usedvehicle.html.twig', [
            'controller_name' => 'HomeController',
            'formView' => $formView,
            'openingShedules' => $openingSheduleRepository->findAll(),
            'usedVehicles' => $usedVehicle,
            'picturesVehicles' => $picturesVehicles,
            'optionsVehicles' => $optionsVehicles,
        ]);
    }

    #[Route('/usedvehicles', name: 'app_usedVehicles', methods: ['GET'])]
    public function showAllVehicles(
        UsedVehiclesRepository $usedVehiclesRepository, 
        OpeningSheduleRepository $openingSheduleRepository, 
        Request $request
        ): Response
    {
        $formView = $this->contactFormService->handleContactForm($request);

        $usedVehicles = $usedVehiclesRepository->findAll();

        return $this->render('home/usedvehicles.html.twig', [
            'controller_name' => 'HomeController',
            'formView' => $formView,
            'openingShedules' => $openingSheduleRepository->findAll(),
            'usedVehicles' => $usedVehicles,
        ]);
    }
}
