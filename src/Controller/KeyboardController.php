<?php

namespace App\Controller;

use App\Entity\Keyboard;
use App\Form\KeyboardFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class KeyboardController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em){

        $this->em = $em;

    }

    #[Route('/keyboard', name: 'app_keyboard')]
    public function index(Request $request): Response
    {
        $keyboard = new Keyboard();
        $keyboardForm = $this->createForm(KeyboardFormType::class, $keyboard);

        $keyboardForm->handleRequest($request);

        $word = $keyboardForm->get('word')->getData();
        $combinations = json_decode($keyboardForm->get('combinations')->getData(), true);

        if ($keyboardForm->isSubmitted() && $keyboardForm->isValid() ) {

            $keyboard->setDecodedWord($word, $combinations);

            $this->em->persist($keyboard);
            $this->em->flush();
        }


        return $this->render('keyboard/index.html.twig', [
            'keyboard' => $keyboard,
            'keyboardForm' => $keyboardForm->createView(),
        ]);
    }
}
