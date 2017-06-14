<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResetPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', PasswordType::class, ['label' => false,
                    'attr' => ['placeholder' => 'Entrez votre nouveau mot de passe']])
            ->add('passwordCompare', PasswordType::class, ['label' => false, 'mapped' => false,
                    'attr' => ['placeholder' => 'Confirmez le nouveau mot de passe']])
            ->add('save', SubmitType::class, ['label' => false,
                    'attr' => ['placeholder' => 'Réinitialiser', 'class' => 'passwordButton']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_reset_password_type';
    }
}
