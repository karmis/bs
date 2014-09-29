<?php

namespace Brainstrap\UserBundle\Controller\Skill;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\UserBundle\Entity\Skill\Skill;
use Brainstrap\UserBundle\Form\Skill\SkillType;

/**
 * Skill\Skill controller.
 *
 */
class SkillController extends Controller
{

    /**
     * Lists all Skill\Skill entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BrainstrapUserBundle:Skill\Skill')->findAll();

        return $this->render('BrainstrapUserBundle:Skill/Skill:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Skill\Skill entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Skill();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('skill_skill_show', array('id' => $entity->getId())));
        }

        return $this->render('BrainstrapUserBundle:Skill/Skill:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Skill\Skill entity.
     *
     * @param Skill $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Skill $entity)
    {
        $form = $this->createForm(new SkillType(), $entity, array(
            'action' => $this->generateUrl('skill_skill_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Skill\Skill entity.
     *
     */
    public function newAction()
    {
        $entity = new Skill();
        $form   = $this->createCreateForm($entity);

        return $this->render('BrainstrapUserBundle:Skill/Skill:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Skill\Skill entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Skill\Skill')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill\Skill entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapUserBundle:Skill/Skill:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Skill\Skill entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Skill\Skill')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill\Skill entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapUserBundle:Skill/Skill:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Skill\Skill entity.
    *
    * @param Skill $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Skill $entity)
    {
        $form = $this->createForm(new SkillType(), $entity, array(
            'action' => $this->generateUrl('skill_skill_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Skill\Skill entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Skill\Skill')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill\Skill entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('skill_skill_edit', array('id' => $id)));
        }

        return $this->render('BrainstrapUserBundle:Skill/Skill:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Skill\Skill entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BrainstrapUserBundle:Skill\Skill')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Skill\Skill entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('skill_skill'));
    }

    /**
     * Creates a form to delete a Skill\Skill entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('skill_skill_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
