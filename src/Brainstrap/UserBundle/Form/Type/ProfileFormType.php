<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 12.08.14
 * Time: 19:13
 */

namespace Brainstrap\UserBundle\Form\Type;

use Brainstrap\UserBundle\Form\EducationType;
use Brainstrap\UserBundle\Form\EmploymentType;
use Brainstrap\UserBundle\Form\HobbyType;
use Brainstrap\UserBundle\Form\PortfolioType;
use Brainstrap\UserBundle\Form\ServiceType;
use Brainstrap\UserBundle\Form\Skill\SkillItemType;
use Brainstrap\UserBundle\Form\SkillType;
use Brainstrap\UserBundle\Form\SocialType;
use Brainstrap\UserBundle\Form\TestimonialType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
//use Symfony\Component\Security\Core\Validator\Constraint\UserPassword as OldUserPassword;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

// User additional forms

class ProfileFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (class_exists('Symfony\Component\Security\Core\Validator\Constraints\UserPassword')) {
            $constraint = new UserPassword();
        } else {
            // Symfony 2.1 support with the old constraint class
            $constraint = new OldUserPassword();
        }

        $this->buildUserForm($builder, $options);

//        $builder->add('current_password', 'password', array(
//            'label' => 'form.current_password',
//            'translation_domain' => 'FOSUserBundle',
//            'mapped' => false,
//            'constraints' => $constraint,
//        ))

        ;

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'profile',
        ));
    }

    public function getName()
    {
        return 'brainstrap_user_profile';
    }

    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('avatar', 'iphp_file')

            ->add(
                'employments',
                'collection',
                array(
                    'type' => new EmploymentType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    'by_reference' => false,
                    'attr' => array('class' => 'employment_item'),
                    'label' => ''
                )
            )

            ->add(
                'educations',
                'collection',
                array(
                    'type' => new EducationType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    'by_reference' => false,
                    'attr' => array('class' => 'education_item'),
                    'label' => ''
                )
            )

            ->add(
                'skills',
                'collection',
                array(
                    'type' => new \Brainstrap\UserBundle\Form\Skill\SkillType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    'by_reference' => false,
                    'attr' => array('class' => 'skill_item'),
                    'label' => ''
                )
            )


            ->add(
                'testimonials',
                'collection',
                array(
                    'type' => new TestimonialType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    'by_reference' => false,
                    'attr' => array('class' => 'testimonials_item'),
                    'label' => ''
                )
            )

            ->add(
                'hobbies',
                'collection',
                array(
                    'type' => new HobbyType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    'by_reference' => false,
                    'attr' => array('class' => 'hobbies_item'),
                    'label' => ''
                )
            )

            ->add(
                'portfolio',
                'collection',
                array(
                    'type' => new PortfolioType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    'by_reference' => false,
                    'attr' => array('class' => 'portfolio_item'),
                    'label' => ''
                )
            )

            ->add(
                'socials',
                'collection',
                array(
                    'type' => new SocialType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    'by_reference' => false,
                    'attr' => array('class' => 'social_item'),
                    'label' => ''
                )
            )

            ->add(
                'services',
                'collection',
                array(
                    'type' => new ServiceType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    'by_reference' => false,
                    'attr' => array('class' => 'service_item'),
                    'label' => ''
                )
            );
    }
}
