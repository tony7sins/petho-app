<?php

namespace App\Controller;

use App\Form\DogFormType;
use App\UseCase\CreateDog\Factory\DogCreator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreatePetController extends AbstractController
{
    /**
     * @Route("/create/pet/dog", name="create_dog")
     */
    public function createDog(EntityManagerInterface $em, Request $request, DogCreator $dogCreator)
    {
        $form = $this->createForm(DogFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $dog = $dogCreator->create($form->getData());
            dd($dog);

            // $em->persist($dog);
            // $em->flush();

            // return $this->redirectToRoute('home');
        }

        return $this->render('create/pet/dog/index.html.twig', [
            'dogForm' => $form->createView(),
        ]);
    }
}
