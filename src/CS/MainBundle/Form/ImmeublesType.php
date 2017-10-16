<?php

namespace CS\MainBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class ImmeublesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse',TextType::class,array(
                'required' => true
            ))
            ->add('nom',TextType::class,array(
                'required' =>false))
            ->add('note',CKEditorType::class,array(
                'required' =>false
            ))
            ->add('biens', EntityType::class, [
                'class'        => 'CSMainBundle:Bien',
                'choice_label' => 'identifiant',
                'expanded'     => false,
                 'multiple'     => true,
             ])        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CS\MainBundle\Entity\Immeubles'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cs_mainbundle_immeubles';
    }


}
