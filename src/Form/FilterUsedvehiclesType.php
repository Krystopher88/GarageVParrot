<?php

namespace App\Form;

use App\Entity\UsedVehicles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
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
            ->add('minPrice', MoneyType::class, [
                'label' => 'Prix minimum',
                'currency' => 'EUR',
                'required' => false,
                'mapped' => false,
            ])
            ->add('maxPrice', MoneyType::class, [
                'label' => 'Prix maximum',
                'currency' => 'EUR',
                'required' => false,
                'mapped' => false,
            ])
            ->add('minMileage', null, [
                'label' => 'Kilométrage minimum',
                'required' => false,
                'mapped' => false,
            ])
            ->add('maxMileage', null, [
                'label' => 'Kilométrage maximun',
                'required' => false,
                'mapped' => false,
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
