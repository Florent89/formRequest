<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, ['label' => 'Nom*'])
            ->add('firstname', null, ['label' => 'Prénom*'])
            ->add('email', EmailType::class, ['label' => 'Email*'])
            ->add('phone_number', null, ['label' => 'Téléphone (+33)',  'required' => false])
            ->add('city', null, ['label' => 'Ville*'])
            ->add('film', null, ['label' => 'Film*'])
            ->add('citation', TextareaType::class,[
                'required' => false,
                'attr' => [
                    'placeholder' => "Est-ce qu'un fenouil c'est redondant ?",
                ],
            ] )
            ->add('Soumettre', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
