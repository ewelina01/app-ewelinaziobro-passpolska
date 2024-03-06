<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Rectangle;
use App\Entity\Square;
use App\Form\CircleFormType;
use App\Form\RectangleFormType;
use App\Form\SquareFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalculatorController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em){

        $this->em = $em;

    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {

        return $this->render("index.html.twig");

    }

    #[Route('/calculate-circle', name: 'app_calculate_circle')]
    public function app_calculate_circle(Request $request): Response
    {

        $circle = new Circle();
        $circleForm = $this->createForm(CircleFormType::class, $circle);

        $circleForm->handleRequest($request);

        $radius = $circleForm->get('radius')->getData();

        if ($circleForm->isSubmitted() && $circleForm->isValid() ) {

            $circle->setPerimeter($radius);
            $circle->setSurface($radius);

            $this->em->persist($circle);
            $this->em->flush();
        }

        return $this->render("calculateCircle.html.twig",[
            'circle' => $circle,
            'circleForm' => $circleForm->createView(),
        ]);

    }

    #[Route('/calculate-rectangle', name: 'app_calculate_rectangle')]
    public function app_calculate_rectangle(Request $request): Response
    {

        $rectangle = new Rectangle();
        $rectangleForm = $this->createForm(RectangleFormType::class, $rectangle);

        $rectangleForm->handleRequest($request);

        $a = $rectangleForm->get('a')->getData();
        $b = $rectangleForm->get('b')->getData();

        if ($rectangleForm->isSubmitted() && $rectangleForm->isValid() ) {

            $rectangle->setPerimeter($a, $b);
            $rectangle->setSurface($a, $b);

            $this->em->persist($rectangle);
            $this->em->flush();
        }

        return $this->render("calculateRectangle.html.twig",[
            'rectangle' => $rectangle,
            'rectangleForm' => $rectangleForm->createView()
        ]);


    }

    #[Route('/calculate-square', name: 'app_calculate_square')]
    public function app_calculate_square(Request $request): Response
    {

        $square = new Square();
        $squareForm = $this->createForm(SquareFormType::class, $square);

        $squareForm->handleRequest($request);

        $a = $squareForm->get('a')->getData();

        if ($squareForm->isSubmitted() && $squareForm->isValid() ) {

            $square->setPerimeter($a);
            $square->setSurface($a);

            $this->em->persist($square);
            $this->em->flush();
        }

        return $this->render("calculateSquare.html.twig",[
            'square' => $square,
            'squareForm' => $squareForm->createView()
        ]);
    }



}
