<?php

namespace App\Form;

use App\Entity\Keyboard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class KeyboardFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('word', TextType::class, [
                'label' => 'Podaj słowo',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Pole nie może być puste'
                    ]),
                    new Regex(array(
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Wyraz powinien składać się z samych liter'
                    )),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Wyraz powinien mieć min 1 znak'
                    ])
                ]
            ])
            ->add('combinations', TextareaType::class, [
                'label' => 'Układ klawiatury',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Pole nie może być puste'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Keyboard::class,
        ]);
    }
}
