<?php

namespace CS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class GarantsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prenom',TextType::class,array(
            'required' =>true
        ))
            ->add('nom',TextType::class,array(
        'required' =>true
    ))
            ->add('adresse',TextareaType::class,array(
                'required' =>false
            ))
            ->add('commentaire',TextareaType::class,array(
        'required' =>true
    ))
            ->add('email',TextType::class,array(
        'required' =>true
    ))
            ->add('telephone',TextType::class,array(
        'required' =>false
    ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CS\MainBundle\Entity\Garants'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cs_mainbundle_garants';
    }


}
