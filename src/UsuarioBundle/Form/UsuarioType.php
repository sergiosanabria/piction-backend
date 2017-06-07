<?php

namespace UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                'attr' => array('placeholder'=> 'Email')
            ))
            ->add('username', null, array(
                'label' => 'Nombre Usuario',
                'attr' => array('placeholder'=> 'Nombre de Usuario')
            ))
            ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'Contraseña','attr' => array('placeholder'=>'contraseña')),
                    'second_options' => array('label' => 'Repita la contraseña','attr' => array('placeholder'=>'Repita la contraseña')),
                    'invalid_message' => 'Las contraseñas ingresadas no coinciden',
                ))
            ;
        $builder->remove('persona');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UsuarioBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'usuariobundle_usuario';
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
}
