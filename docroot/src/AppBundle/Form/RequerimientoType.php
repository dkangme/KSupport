<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class RequerimientoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('timestampApertura', 'datetime')
            //->add('timestampCierre', 'datetime')
            ->add('estado', HiddenType::class, array(
                    'data' => 'NUEVO',
            ))

            ->add('usuario', EntityType::class, array(
                'class' => 'AppBundle:Usuario',
                'choice_label' => 'nombre_completo',
                'label' => 'Usuario: '
            ))

            ->add('descripcion', CKEditorType::class, array(
                'config' => array(
                'uiColor' => '#ffffff',
                ),
                'label' => 'Detalle del requerimiento: '
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Requerimiento'
        ));
    }
}
