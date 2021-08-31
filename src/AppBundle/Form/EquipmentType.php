<?php

namespace cocose\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('equipmentName')->add('equipmentEmail')->add('equipmentPhone')->add('equipmentNumber')->add('equipmentTeacher')->add('equipmentClass')->add('equipmentDate')->add('equipmentReturndate')->add('equipmentContent')->add('equipmentStatus')->add('equipmentQuantity');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'cocose\WebBundle\Entity\Equipment'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cocose_webbundle_equipment';
    }


}
