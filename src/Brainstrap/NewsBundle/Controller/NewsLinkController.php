<?php

namespace Brainstrap\NewsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Brainstrap\NewsBundle\Entity\NewsLink;
use Brainstrap\NewsBundle\Form\NewsLinkType;

/**
 * NewsLink controller.
 *
 */
class NewsLinkController extends Controller
{

    /**
     * Lists all NewsLink entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BrainstrapNewsBundle:NewsLink')->findAll();

        return $this->render('BrainstrapNewsBundle:NewsLink:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new NewsLink entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NewsLink();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('newslink_show', array('id' => $entity->getId())));
        }

        return $this->render('BrainstrapNewsBundle:NewsLink:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NewsLink entity.
     *
     * @param NewsLink $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NewsLink $entity)
    {
        $form = $this->createForm(new NewsLinkType(), $entity, array(
            'action' => $this->generateUrl('newslink_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NewsLink entity.
     *
     */
    public function newAction()
    {
        $entity = new NewsLink();
        $form   = $this->createCreateForm($entity);

        return $this->render('BrainstrapNewsBundle:NewsLink:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NewsLink entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapNewsBundle:NewsLink')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsLink entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapNewsBundle:NewsLink:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NewsLink entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapNewsBundle:NewsLink')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsLink entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BrainstrapNewsBundle:NewsLink:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a NewsLink entity.
    *
    * @param NewsLink $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NewsLink $entity)
    {
        $form = $this->createForm(new NewsLinkType(), $entity, array(
            'action' => $this->generateUrl('newslink_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NewsLink entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BrainstrapNewsBundle:NewsLink')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsLink entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('newslink_edit', array('id' => $id)));
        }

        return $this->render('BrainstrapNewsBundle:NewsLink:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a NewsLink entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BrainstrapNewsBundle:NewsLink')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NewsLink entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('newslink'));
    }

    /**
     * Creates a form to delete a NewsLink entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newslink_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
