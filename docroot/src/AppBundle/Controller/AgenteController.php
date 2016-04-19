<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Agente;
use AppBundle\Form\AgenteType;

/**
 * Agente controller.
 *
 * @Route("/data/agente")
 */
class AgenteController extends Controller
{
    /**
     * Lists all Agente entities.
     *
     * @Route("/", name="data_agente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $agentes = $em->getRepository('AppBundle:Agente')->findAll();

        return $this->render('agente/index.html.twig', array(
            'agentes' => $agentes,
        ));
    }

    /**
     * Creates a new Agente entity.
     *
     * @Route("/new", name="data_agente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $agente = new Agente();
        $form = $this->createForm('AppBundle\Form\AgenteType', $agente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agente);
            $em->flush();

            return $this->redirectToRoute('data_agente_show', array('id' => $agente->getId()));
        }

        return $this->render('agente/new.html.twig', array(
            'agente' => $agente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Agente entity.
     *
     * @Route("/{id}", name="data_agente_show")
     * @Method("GET")
     */
    public function showAction(Agente $agente)
    {
        $deleteForm = $this->createDeleteForm($agente);

        return $this->render('agente/show.html.twig', array(
            'agente' => $agente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Agente entity.
     *
     * @Route("/{id}/edit", name="data_agente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Agente $agente)
    {
        $deleteForm = $this->createDeleteForm($agente);
        $editForm = $this->createForm('AppBundle\Form\AgenteType', $agente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agente);
            $em->flush();

            return $this->redirectToRoute('data_agente_edit', array('id' => $agente->getId()));
        }

        return $this->render('agente/edit.html.twig', array(
            'agente' => $agente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Agente entity.
     *
     * @Route("/{id}", name="data_agente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Agente $agente)
    {
        $form = $this->createDeleteForm($agente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($agente);
            $em->flush();
        }

        return $this->redirectToRoute('data_agente_index');
    }

    /**
     * Creates a form to delete a Agente entity.
     *
     * @param Agente $agente The Agente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Agente $agente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('data_agente_delete', array('id' => $agente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
