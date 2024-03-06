<?php

namespace App\Form;

use App\Entity\Circle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class CircleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('radius', IntegerType::class, [
                'label' => 'Podaj promień [mm]: ',
                'constraints' => [
                    new NotBlank(),
                    new Type('integer'),
                    new Regex(array(
                        'pattern' => '/^[0-9]\d*$/',
                        'message' => 'Liczba powinna być dodatnia.'
                    ))
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Circle::class,
        ]);
    }
}
