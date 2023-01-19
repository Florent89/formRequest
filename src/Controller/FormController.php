<?php

namespace App\Controller;

use App\Entity\Information;
use App\Form\InformationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }

    /**
     * @Route("/information", name="form")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $info = new Information();
        $form = $this->createForm(InformationFormType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($info);
            $entityManager->flush();

            return $this->redirectToRoute('congratulation', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('form/form.html.twig', [
            'information' => $info,
            'form' => $form,
        ]);
    }

       /**
     * @Route("/congratulation", name="congratulation")
     */
    public function congratulation(): Response
    {
        return $this->render('form/congratulation.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }
}
