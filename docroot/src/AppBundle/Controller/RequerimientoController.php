<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Requerimiento;
use AppBundle\Form\RequerimientoType;

/**
 * Requerimiento controller.
 *
 * @Route("/data/requerimiento")
 */
class RequerimientoController extends Controller
{
    /**
     * Lists all Requerimiento entities.
     *
     * @Route("/", name="data_requerimiento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $requerimientos = $em->getRepository('AppBundle:Requerimiento')->findAll();

        return $this->render('requerimiento/index.html.twig', array(
            'requerimientos' => $requerimientos,
        ));
    }

    /**
     * Creates a new Requerimiento entity.
     *
     * @Route("/new", name="data_requerimiento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $requerimiento = new Requerimiento();
        $form = $this->createForm('AppBundle\Form\RequerimientoType', $requerimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $requerimiento->setTimestampApertura(new \DateTime());
            $em->persist($requerimiento);
            $em->flush();

            return $this->redirectToRoute('data_requerimiento_show', array('id' => $requerimiento->getId()));
        }

        return $this->render('requerimiento/new.html.twig', array(
            'requerimiento' => $requerimiento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Requerimiento entity.
     *
     * @Route("/{id}", name="data_requerimiento_show")
     * @Method("GET")
     */
    public function showAction(Requerimiento $requerimiento)
    {
        $deleteForm = $this->createDeleteForm($requerimiento);

        return $this->render('requerimiento/show.html.twig', array(
            'requerimiento' => $requerimiento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Requerimiento entity.
     *
     * @Route("/{id}/edit", name="data_requerimiento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Requerimiento $requerimiento)
    {
        $deleteForm = $this->createDeleteForm($requerimiento);
        $editForm = $this->createForm('AppBundle\Form\RequerimientoType', $requerimiento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($requerimiento);
            $em->flush();

            return $this->redirectToRoute('data_requerimiento_edit', array('id' => $requerimiento->getId()));
        }

        return $this->render('requerimiento/edit.html.twig', array(
            'requerimiento' => $requerimiento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Requerimiento entity.
     *
     * @Route("/{id}", name="data_requerimiento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Requerimiento $requerimiento)
    {
        $form = $this->createDeleteForm($requerimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($requerimiento);
            $em->flush();
        }

        return $this->redirectToRoute('data_requerimiento_index');
    }

    /**
     * Creates a form to delete a Requerimiento entity.
     *
     * @param Requerimiento $requerimiento The Requerimiento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Requerimiento $requerimiento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('data_requerimiento_delete', array('id' => $requerimiento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
