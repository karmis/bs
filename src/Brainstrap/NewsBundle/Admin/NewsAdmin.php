<?php

namespace Brainstrap\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class NewsAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('id')
            ->add('title')
            ->add('announce')
            ->add('text')
//            ->add('createdAt')
//            ->add('updatedAt')
            ->add('pubDate')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('id')
            ->add('title')
            ->add('announce')
            ->add('text')
//            ->add('createdAt')
//            ->add('updatedAt')
//            ->add('pubDate')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
            ->add('title')
            ->add('announce')
            ->add('text')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('newsCategory', 'entity',array(
                'label' => 'Выберите категорию',
                'class' => 'Brainstrap\NewsBundle\Entity\NewsCategory',
                'property' => 'name',
                'multiple' => true,
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('announce')
            ->add('text')
//            ->add('createdAt')
//            ->add('updatedAt')
//            ->add('pubDate')
        ;
    }
}
