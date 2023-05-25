<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class UserRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('escudo',FileType::class ,['mapped' => false], array(
                'attr' => array(
                    'class' => 'form-control imageUpload',
                    'required'=> 'true',
                )))
            ->add('nombre',null , array(
                'attr' => array(
                    'label' => 'Nombre del club',
                    'class' => 'form-control',
                    'autofocus' => 'true',
                    'required'=> 'true'
                )))
            ->add('email', null, array(
                'attr' => array(
                    'label' => 'Email',
                    'class' => 'form-control',
                    'autofocus' => 'true',
                    'required'=> 'true'                )))
            ->add('password',null , array(
                'attr' => array(
                    'label' => 'Contraseña',
                    'class' => 'form-control',
                    'required'=> 'true'
                )))
            ->add('agreeTerms', CheckboxType::class, array(
                'label' => 'Al marcar esta casilla acepto los termino y las politicas de uso de este sitio web.',
            ), ['mapped' => false])
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