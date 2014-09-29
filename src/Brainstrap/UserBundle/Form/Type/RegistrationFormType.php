<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 12.08.14
 * Time: 1:32
 */

namespace Brainstrap\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        parent::buildForm($builder, $options);

        $builder
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'first_name' => 'pass',
                'second_name' => 'confirm',
                'invalid_message' => 'fos_user.password.mismatch',
            ));
//        $builder->add('name');
    }

    public function getName()
    {
        return 'brainstrap_user_registration';
    }
}
