<?php

namespace App\Form;

use App\Model\Pet\DogFormModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DogFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('height', IntegerType::class)
            ->add('weight', IntegerType::class)
            ->add('age', IntegerType::class)
            ->add('isActive', CheckboxType::class)
            ->add('isMale', CheckboxType::class)
            ->add('isSterilized', CheckboxType::class)
            ->add('isCaptived', CheckboxType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DogFormModel::class,
        ]);
    }
}
