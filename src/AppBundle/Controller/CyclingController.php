<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Cycling;
use AppBundle\Form\CyclingType;

/**
 * Cycling controller.
 *
 * @Route("/cycling")
 */
class CyclingController extends Controller
{
    /**
     * Lists all Cycling entities.
     *
     * @Route("/", name="cycling_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cyclings = $em->getRepository('AppBundle:Cycling')->findAll();

        return $this->render('cycling/index.html.twig', array(
            'cyclings' => $cyclings,
        ));
    }

    /**
     * Creates a new Cycling entity.
     *
     * @Route("/new", name="cycling_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cycling = new Cycling();
        $form = $this->createForm('AppBundle\Form\CyclingType', $cycling);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cycling);
            $em->flush();

            return $this->redirectToRoute('cycling_show', array('id' => $cycling->getId()));
        }

        return $this->render('cycling/new.html.twig', array(
            'cycling' => $cycling,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cycling entity.
     *
     * @Route("/{id}", name="cycling_show")
     * @Method("GET")
     */
    public function showAction(Cycling $cycling)
    {
        $deleteForm = $this->createDeleteForm($cycling);

        return $this->render('cycling/show.html.twig', array(
            'cycling' => $cycling,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cycling entity.
     *
     * @Route("/{id}/edit", name="cycling_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cycling $cycling)
    {
        $deleteForm = $this->createDeleteForm($cycling);
        $editForm = $this->createForm('AppBundle\Form\CyclingType', $cycling);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cycling);
            $em->flush();

            return $this->redirectToRoute('cycling_edit', array('id' => $cycling->getId()));
        }

        return $this->render('cycling/edit.html.twig', array(
            'cycling' => $cycling,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cycling entity.
     *
     * @Route("/{id}", name="cycling_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cycling $cycling)
    {
        $form = $this->createDeleteForm($cycling);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cycling);
            $em->flush();
        }

        return $this->redirectToRoute('cycling_index');
    }

    /**
     * Creates a form to delete a Cycling entity.
     *
     * @param Cycling $cycling The Cycling entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cycling $cycling)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cycling_delete', array('id' => $cycling->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
