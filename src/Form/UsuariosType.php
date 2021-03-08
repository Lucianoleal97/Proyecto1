<?php

namespace App\Form;

use App\Entity\Usuarios;
use App\Entity\Dispositivos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsuariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_usuario_k')
            ->add('id_usuario_a')
            ->add('nombre')
        ->add('UsuDisp', EntityType::class, [ 
                'label'=>'Dispositivos',
                'class' => Dispositivos::Class,
                'choice_label' => 'descripcion',
                'choice_value' => 'descripcion', //esto hace la magia (se llaman iguales)
                'placeholder' => 'Elegir un dispositivo',
                'multiple' => true,
            ])
        ->add('Guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuarios::class,
        ]);
    }
}
