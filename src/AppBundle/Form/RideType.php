<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RideType extends ActivityType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('avgCadence')
            ->add('avgPower')
            ->add('intensityFactor')
            ->add('maxCadence')
            ->add('maxPower')
            ->add('normalizedPower')
            ->add('tss')
            ->add('work')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ride'
        ));
    }
}
