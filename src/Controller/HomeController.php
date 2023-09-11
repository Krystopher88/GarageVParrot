<?php

namespace App\Controller;

use App\Form\ModalContactType;
use App\Repository\MessagingRepository;
use App\Repository\OpeningSheduleRepository;
use App\Repository\UsedVehiclesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $messagingRepository;

    public function __construct(MessagingRepository $messagingRepository)
    {
        $this->messagingRepository = $messagingRepository;
    }
        
    #[Route('/', name: 'app_home')]
    public function index(OpeningSheduleRepository $openingSheduleRepository, UsedVehiclesRepository $usedVehiclesRepository ,Request $request,): Response
    {
        $form = $this->createForm(ModalContactType::class);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $messaging = $form->getData();
                $this->messagingRepository->saveMessage($messaging);
                $this->addFlash('success', 'Votre message a bien été envoyé');
                return $this->redirectToRoute('app_home');
            }
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'openingShedules' => $openingSheduleRepository->findAll(),
            'form' => $form->createView(),
            'usedVehiclesCards' => $usedVehiclesRepository->findCardUsedVehicles(),
        ]);
    }

}
