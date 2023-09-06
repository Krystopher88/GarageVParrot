<?php

namespace App\Controller;

use App\Form\ModalContactType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OpeningSheduleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(OpeningSheduleRepository $openingSheduleRepository, Request $request): Response
    {
        $form = $this->createForm(ModalContactType::class);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->entityManager->persist($form->getData());
                $this->entityManager->flush();
            }
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'openingShedules' => $openingSheduleRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }
}
