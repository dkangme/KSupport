<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BitacoraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('timestamp', 'datetime')
            ->add('evento', CKEditorType::class, array(
                'config' => array(
                'uiColor' => '#ffffff',
                ),
                'label' => 'Detalle de la acción: '
            ))
            ->add('send_email', ChoiceType::class, array(
                    'choices'  => array(
                        'Si' => true,
                        'No' => false,
                    ),
                    'label' => '¿Enviar esta nota por correo al usuario?'))
            //o->add('ticket')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Bitacora'
        ));
    }
}
