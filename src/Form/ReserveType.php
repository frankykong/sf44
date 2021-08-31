<?php

namespace cocose\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReserveType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('reserveName')->add('reserveEmail')->add('reservePhone')->add('reserveNumber')->add('reserveTeacher')->add('reserveClass')->add('reserveDate')->add('reserveTime')->add('reserveContent')->add('reserveStatus');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'cocose\WebBundle\Entity\Reserve'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cocose_webbundle_reserve';
    }


}
