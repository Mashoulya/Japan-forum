<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom',
                    'id' => 'lastname-input',
                    'class' => 'form-control',
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Prénom',
                    'id' => 'firstname-input',
                    'class' => 'form-control',
                ],
            ])
            ->add('nickname', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nickname',
                    'id' => 'nickname-input',
                    'class' => 'form-control',
                ],
            ])
            ->add('birthDate', DateType::class, [
                'widget' => 'single_text',
                'label' => false,
                'attr' => [
                    'id' => 'birthday-input',
                    'class' => 'form-control',
                ],
            ])
            ->add('sex', ChoiceType::class, [
                'choices' => [
                    'F' => 'female',
                    'H' => 'male',
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => false,
                'attr' => [
                    'class' => 'form-check-input',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Email',
                    'id' => 'email-input',
                    'class' => 'form-control',
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Mot de passe',
                    'id' => 'pwd',
                    'class' => 'form-control',
                ],
            ])
            ->add('confirmPassword', PasswordType::class,[
                'mapped' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Confirmez mot de passe',
                    'id' => 'confirm-pwd',
                    'class' => 'form-control',
                ],
            ])
            ->add('userPhoto', FileType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'id' => 'photo-input',
                    'class' => 'form-control-file',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
