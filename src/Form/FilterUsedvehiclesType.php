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
            ->add('brandVehicle')
            ->add('fuelTypeVehicle')
            ->add('transmissionVehicle')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UsedVehicles::class,
        ]);
    }
}
