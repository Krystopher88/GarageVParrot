<?php

namespace App\Controller;


use App\Service\ContactFormService;
use App\Form\FilterUsedvehiclesType;
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

        // Crée le formulaire de recherche
        $formFilterVehicles = $this->createForm(FilterUsedvehiclesType::class);
        $formFilterVehicles->handleRequest($request);
    
        if ($formFilterVehicles->isSubmitted() && $formFilterVehicles->isValid()) {
            // Récupère les données du formulaire en utilisant les noms des champs comme clés
            $searchData['brandVehicle'] = $formFilterVehicles->get('brandVehicle')->getData();
            $searchData['fuelTypeVehicle'] = $formFilterVehicles->get('fuelTypeVehicle')->getData();
            $searchData['transmissionVehicle'] = $formFilterVehicles->get('transmissionVehicle')->getData();
    
            // Utilise la méthode de recherche personnalisée du repository pour filtrer les véhicules
            $usedVehiclesCards = $usedVehiclesRepository->findSearchVehicles($searchData);
        } else {
            // Si le formulaire n'a pas été soumis ou si aucun critère de recherche n'a été sélectionné, affiche tous les véhicules
            $usedVehiclesCards = $usedVehiclesRepository->findAll();
        }
    
        // Gère le formulaire $formView ici en utilisant le service approprié ou la logique
        // ...
    
        return $this->render('home/usedvehicles.html.twig', [
            'controller_name' => 'HomeController',
            'formFilterVehicles' => $formFilterVehicles->createView(),
            'formView' => $formView, // Assurez-vous de gérer $formView correctement ici
            'openingShedules' => $openingSheduleRepository->findAll(),
            'usedVehiclesCards' => $usedVehiclesCards, // Assurez-vous que le nom de la variable correspond à votre modèle Twig
        ]);
    }
}
