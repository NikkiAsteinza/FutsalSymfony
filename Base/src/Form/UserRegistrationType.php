<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null, array(
                'attr' => array(
                    'label' => 'Email',
                    'class' => 'form-control',
                    'autofocus' => 'true'
                )))
            ->add('password',null , array(
                'attr' => array(
                    'label' => 'Contraseña',
                    'class' => 'form-control mb-3',
                )))
            ->add('Crear',SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary my-2 my-sm-0 ml-1',
                )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}