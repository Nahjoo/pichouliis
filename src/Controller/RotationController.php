<?php

namespace App\Controller;

use App\Entity\Rotation;
use App\Form\RotationType;
use App\Repository\RotationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rotation")
 */
class RotationController extends AbstractController
{
    /**
     * @Route("/", name="rotation_index", methods={"GET", "POST"})
     */
    public function index(RotationRepository $rotationRepository): Response
    {
        return $this->render('rotation/index.html.twig', [
            'rotations' => $rotationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rotation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rotation = new Rotation();
        $form = $this->createForm(RotationType::class, $rotation);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            if( $request->getMethod() == 'POST' ) {
                $chrono = $request->request->get('chronotime');
                $choice_recolte = $request->request->get('recolte');
                $choice_couvert = $request->request->get('couvert');
                $choice_preparation = $request->request->get('preparation');
                $choice_bachage = $request->request->get('bachage');

                if($choice_recolte){
                    $rotation->setChoice($choice_recolte);
                }else if($choice_couvert){
                    $rotation->setChoice($choice_couvert);
                }else if($choice_preparation){
                    $rotation->setChoice($choice_preparation);
                }

                if($choice_couvert == 'Bachage' || $choice_bachage){
                    $rotation->setChoice($choice_couvert." ".$choice_bachage);
                }
            }

            $rotation->setTime($chrono);
            $rotation->setName('Rotation');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rotation);
            $entityManager->flush();

            return $this->redirectToRoute('rotation_index');
        }

        return $this->render('rotation/new.html.twig', [
            'rotation' => $rotation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rotation_show", methods={"GET"})
     */
    public function show(Rotation $rotation): Response
    {
        return $this->render('rotation/show.html.twig', [
            'rotation' => $rotation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rotation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rotation $rotation): Response
    {
        $form = $this->createForm(RotationType::class, $rotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rotation_index', [
                'id' => $rotation->getId(),
            ]);
        }

        return $this->render('rotation/edit.html.twig', [
            'rotation' => $rotation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rotation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Rotation $rotation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rotation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rotation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rotation_index');
    }
}
