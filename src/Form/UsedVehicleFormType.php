<?php

namespace App\Form;

use App\Entity\Messaging;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class UsedVehicleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('subject', HiddenType::class, [
                'data' => 'Véhicule',
            ])
            ->add('phoneNumber')
            ->add('email')
            ->add('lastName')
            ->add('firstName')
            ->add('message')
            ->add('brandVehicle', HiddenType::class, [
                'mapped' => false,
            ])
            ->add('model', HiddenType::class, [
                'mapped' => false,
            ])
            ->add('dateOfCirculation', HiddenType::class, [
                'mapped' => false,
            ])
            ->add('price', HiddenType::class, [
                'mapped' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Messaging::class,
        ]);
    }
}
