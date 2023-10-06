<?php

namespace App\Service;

use App\Entity\Messaging;
use App\Form\UsedVehicleFormType;
use App\Repository\MessagingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;

class VehicleFormService
{
    private $formFactory;
    private $messagingRepository;

    public function __construct(
        FormFactoryInterface $formFactory,
        MessagingRepository $messagingRepository,
    ) {
        $this->formFactory = $formFactory;
        $this->messagingRepository = $messagingRepository;
    }

    public function handleUsedVehicleForm(Request $request)
    {
        $form = $this->formFactory->create(UsedVehicleFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messaging = $form->getData();
            $message = '';

            // Récupérer les valeurs des champs cachés
            $brandVehicle = $request->request->get('brandVehicle');
            $model = $request->request->get('model');
            $dateOfCirculation = $request->request->get('dateOfCirculation');
            $price = $request->request->get('price');

            // Injecter les valeurs des champs cachés dans le champ "message"
            $message .= 'Véhicule concerné'. "\n" .$brandVehicle . "\n" . $model . "\n" . $dateOfCirculation . "\n" . $price.'€';

            // Ajouter le message de l'utilisateur
            $userMessage = $messaging->getMessage();
            $message .= "\n" . $userMessage;

            $messaging->setMessage($message);
            $this->messagingRepository->saveMessage($messaging);
        }

        return $form->createView();
    }
}
