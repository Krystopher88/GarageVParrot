<?php

namespace App\Controller;


use Ap\Entity\UsedVehicles;
use App\Entity\PictureVehicles;
use App\Entity\UsedVehicles as EntityUsedVehicles;
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
            'form' => $formView,
            'usedVehiclesCards' => $usedVehiclesRepository->findCardUsedVehicles(),
        ]);

    }

    #[Route('/usedvehicle{id}', name: 'app_usedVehicle', methods: ['GET'])]
    public function show(UsedVehiclesRepository $usedVehiclesRepository, OpeningSheduleRepository $openingSheduleRepository, Request $request) : Response
    {

        $formView = $this->contactFormService->handleContactForm($request);

        $id = $request->attributes->get('id');
        $usedVehicle = $usedVehiclesRepository->findOneBy(['id' => $id]);
        $picturesVehicles = $usedVehicle->getPictureVehicles();
        $optionsVehicles = $usedVehicle->getOptionsVehicles();

        return $this->render('home/usedvehicle.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $formView,
            'openingShedules' => $openingSheduleRepository->findAll(),
            'usedVehicles' => $usedVehicle,
            'picturesVehicles' => $picturesVehicles,
            'optionsVehicles' => $optionsVehicles,
        ]);
    }
}
