<?php

namespace Brainstrap\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\UserBundle\Entity\Employment;
use Brainstrap\UserBundle\Form\EmploymentType;

/**
 * Employment controller.
 *
 */
class EmploymentController extends Controller
{

    /**
     * Lists all Employment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BrainstrapUserBundle:Employment')->findAll();

        return $this->render('BrainstrapUserBundle:Employment:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Employment entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Employment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('employment_show', array('id' => $entity->getId())));
        }

        return $this->render('BrainstrapUserBundle:Employment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Employment entity.
     *
     * @param Employment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Employment $entity)
    {
        $form = $this->createForm(new EmploymentType(), $entity, array(
            'action' => $this->generateUrl('employment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Employment entity.
     *
     */
    public function newAction()
    {
        $entity = new Employment();
        $form   = $this->createCreateForm($entity);

        return $this->render('BrainstrapUserBundle:Employment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Employment entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Employment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapUserBundle:Employment:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Employment entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Employment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employment entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapUserBundle:Employment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Employment entity.
    *
    * @param Employment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Employment $entity)
    {
        $form = $this->createForm(new EmploymentType(), $entity, array(
            'action' => $this->generateUrl('employment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Employment entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Employment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Employment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('employment_edit', array('id' => $id)));
        }

        return $this->render('BrainstrapUserBundle:Employment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Employment entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BrainstrapUserBundle:Employment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Employment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('employment'));
    }

    /**
     * Creates a form to delete a Employment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
