<?php

namespace Buseta\CombustibleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListaNegraCombustibleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('autobus','entity',array(
                'class' => 'BusetaBusesBundle:Autobus',
                'placeholder' => '---Seleccione---',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('fechaInicio', 'date', array(
                'widget' => 'single_text',
                'required' => true,
                'label' => 'Fecha Inicio',
                'format'  => 'dd/MM/yyyy',
                'attr'   => array(
                    'class' => 'form-control',
                ),
            ))
            ->add('fechaFinal', 'date', array(
                'widget' => 'single_text',
                'required' => true,
                'label' => 'Fecha Final',
                'format'  => 'dd/MM/yyyy',
                'attr'   => array(
                    'class' => 'form-control',
                ),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Buseta\CombustibleBundle\Entity\ListaNegraCombustible'
        ));
    }

    public function getName()
    {
        return 'combustible_lista_negra_combustible';
    }
}
