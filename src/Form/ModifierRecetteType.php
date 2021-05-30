<?php

namespace App\Form;

use App\Entity\Recette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ModifierRecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('type',ChoiceType::class, [
                'choices' => [
                    'Sucrée' => "Sucré",
                    'Salée' => "Sucré",
                ],
            ])
            ->add('categorie',ChoiceType::class, [
                'choices' => [
                    'Entrée' => "Entrée",
                    'Plat principal' => "Plat principal",
                    'Dessert' => "Dessert",
                ],
            ])
            ->add('difficulte',ChoiceType::class, [
                'choices' => [
                    'Facile' => "Facile",
                    'Moyen' => "Moyen",
                    'Difficile' => "Difficile",
                ],
            ])
            ->add('description')
            ->add('photo')
            ->add('preparation')
            ->add('repos')
            ->add('cuisson')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
