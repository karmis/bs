<?php

namespace Brainstrap\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\UserBundle\Entity\Social;
use Brainstrap\UserBundle\Form\SocialType;

/**
 * Social controller.
 *
 */
class SocialController extends Controller
{

    /**
     * Lists all Social entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BrainstrapUserBundle:Social')->findAll();

        return $this->render('BrainstrapUserBundle:Social:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Social entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Social();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('social_show', array('id' => $entity->getId())));
        }

        return $this->render('BrainstrapUserBundle:Social:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Social entity.
     *
     * @param Social $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Social $entity)
    {
        $form = $this->createForm(new SocialType(), $entity, array(
            'action' => $this->generateUrl('social_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Social entity.
     *
     */
    public function newAction()
    {
        $entity = new Social();
        $form   = $this->createCreateForm($entity);

        return $this->render('BrainstrapUserBundle:Social:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Social entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Social')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Social entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapUserBundle:Social:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Social entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Social')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Social entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapUserBundle:Social:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Social entity.
    *
    * @param Social $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Social $entity)
    {
        $form = $this->createForm(new SocialType(), $entity, array(
            'action' => $this->generateUrl('social_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Social entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapUserBundle:Social')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Social entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('social_edit', array('id' => $id)));
        }

        return $this->render('BrainstrapUserBundle:Social:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Social entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BrainstrapUserBundle:Social')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Social entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('social'));
    }

    /**
     * Creates a form to delete a Social entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('social_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
