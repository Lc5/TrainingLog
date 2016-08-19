<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('avgHr')
            ->add('avgTemp')
            ->add('avgSpeed')
            ->add('calories')
            ->add('description')
            ->add('device')
            ->add('distance')
            ->add('elapsedTime', TimeType::class)
            ->add('gear')
            ->add('isCommute')
            ->add('isManual')
            ->add('isTrainer')
            ->add('maxHr')
            ->add('maxSpeed')
            ->add('maxTemp')
            ->add('movingTime', TimeType::class)
            ->add('name')
            ->add('startDate', DateTimeType::class)
            ->add('user')
            ->add('workoutType')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Activity'
        ));
    }
}
