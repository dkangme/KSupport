<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TicketType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion', CKEditorType::class, array(
                'config' => array(
                'uiColor' => '#ffffff',
                ),
                'label' => 'Detalle del ticket: '
            ))
            //->add('apertura', 'datetime')
            //->add('cierre', 'datetime')
            ->add('estado', HiddenType::class, array(
                    'data' => 'ASIGNADO',
            ))
            ->add('tipo', EntityType::class, array(
                'class' => 'AppBundle:Tipo',
                'choice_label' => 'descripcion',
                'label' => 'Tipo de ticket: '
                ))
            //->add('requerimiento')
            ->add('agente', EntityType::class, array(
                'class' => 'AppBundle:Agente',
                'choice_label' => 'nombre_completo',
                'label' => 'Asignado a: '
                ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ticket'
        ));
    }
}
