<?php

namespace Brainstrap\UserBundle\Controller\Skill;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\UserBundle\Entity\Skill\SkillCategory;
use Brainstrap\UserBundle\Form\Skill\SkillCategoryType;

/**
 * Skill\SkillCategory controller.
 *
 */
class SkillCategoryController extends Controller
{

    /**
     * Lists all Skill\SkillCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BrainstrapUserBundle:Skill\SkillCategory')->findAll();

        return $this->render('BrainstrapUserBundle:Skill/SkillCategory:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Skill\SkillCategory entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SkillCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('skill_skillcategory_show', array('id' => $entity->getId())));
        }

        return $this->render('BrainstrapUserBundle:Skill/SkillCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Skill\SkillCategory entity.
     *
     * @param SkillCategory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SkillCategory $entity)
    {
        $form = $this->createForm(new SkillCategoryType(), $entity, array(
            'action' => $this->generateUrl('skill_skillcategory_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Skill\SkillCategory entity.
     *
     */
    public function newAction()
    {
        $entity = new SkillCategory();
        $form   = $this->createCreateForm($entity);

        return $this->render('BrainstrapUserBundle:Skill/SkillCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Skill\SkillCategory entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Skill\SkillCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill\SkillCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapUserBundle:Skill/SkillCategory:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Skill\SkillCategory entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Skill\SkillCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill\SkillCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapUserBundle:Skill/SkillCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Skill\SkillCategory entity.
    *
    * @param SkillCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SkillCategory $entity)
    {
        $form = $this->createForm(new SkillCategoryType(), $entity, array(
            'action' => $this->generateUrl('skill_skillcategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Skill\SkillCategory entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Skill\SkillCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill\SkillCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('skill_skillcategory_edit', array('id' => $id)));
        }

        return $this->render('BrainstrapUserBundle:Skill/SkillCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Skill\SkillCategory entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BrainstrapUserBundle:Skill\SkillCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Skill\SkillCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('skill_skillcategory'));
    }

    /**
     * Creates a form to delete a Skill\SkillCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('skill_skillcategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
