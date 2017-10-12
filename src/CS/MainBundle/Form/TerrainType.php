<?php

namespace CS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TerrainType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('identifiant', TextType::class,array(
                'required' =>true
            ))
            ->add('ville',TextType::class,array(
        'required' =>true
    ))
            ->add('adresse',TextType::class,array(
                'required' =>true
            ))
            ->add('feuilleCadastrale',TextType::class,array(
                'required' =>false
            ))
            ->add('parcelleCadastrale',TextType::class,array(
                'required' =>false
            ))
            ->add('categorieCadastrale',TextType::class,array(
                'required' =>false
            ))
            ->add('superficie',TextType::class,array(
                'required' =>false
            ))
            ->add('lot',TextType::class,array(
                'required' =>false
            ))
            ->add('noParcelle',TextType::class,array(
                'required' =>false
            ))
                   ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CS\MainBundle\Entity\Terrain'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cs_mainbundle_terrain';
    }


}
