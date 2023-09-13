<?php

namespace App\Service;

use App\Entity\Messaging;
use App\Form\ModalContactType;
use App\Repository\MessagingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;

class ContactFormService
{
  private $formFactory;
  private $messagingRepository;


  public function __construct(
    FormFactoryInterface $formFactory,
    MessagingRepository $messagingRepository,
  ){
    $this->formFactory = $formFactory;
    $this->messagingRepository = $messagingRepository;
  }

  public function handleContactForm(Request $request)
  {
    $form = $this->formFactory->create(ModalContactType::class);

    if ($request->isMethod('POST')){
      $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
          $messaging = $form->getData();
          $this->messagingRepository->saveMessage($messaging);
          // $this->addFlash('success', 'Votre message à bien été envoyé');
        }
    }
    return $form->createView();
  }

}