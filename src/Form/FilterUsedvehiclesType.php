<?php

namespace App\Form;

use App\Entity\UsedVehicles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterUsedvehiclesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brandVehicle', null, [
                'label' => 'Marque',
                'placeholder' => 'Choissisez une marque',
            ])
            ->add('fuelTypeVehicle', null, [
                'label' => 'Carburant',
                'placeholder' => 'Choissisez un type de carburant',
            ])
            ->add('transmissionVehicle' , null, [
                'label' => 'Transmission',
                'placeholder' => 'Choissisez une transmission',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UsedVehicles::class,
            'method' => 'GET',
            'crsf_protection' => false
        ]);
    }
}
