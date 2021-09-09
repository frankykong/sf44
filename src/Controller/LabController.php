<?php

namespace App\Controller;

use App\Entity\Lab;
use App\Form\LabType;
use App\Repository\LabRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/lab")
 */
class LabController extends AbstractController
{
    /**
     * @Route("/", name="lab_index", methods={"GET"})
     */
    public function index(LabRepository $labRepository): Response
    {
        return $this->render('lab/index.html.twig', [
            'labs' => $labRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lab_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lab = new Lab();
        $form = $this->createForm(LabType::class, $lab);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lab);
            $entityManager->flush();

            return $this->redirectToRoute('lab_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lab/new.html.twig', [
            'lab' => $lab,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lab_show", methods={"GET"})
     */
    public function show(Lab $lab): Response
    {
        return $this->render('lab/show.html.twig', [
            'lab' => $lab,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lab_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lab $lab): Response
    {
        $form = $this->createForm(LabType::class, $lab);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lab_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lab/edit.html.twig', [
            'lab' => $lab,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lab_delete", methods={"POST"})
     */
    public function delete(Request $request, Lab $lab): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lab->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lab);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lab_index', [], Response::HTTP_SEE_OTHER);
    }
}
