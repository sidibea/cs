<?php

namespace CS\MainBundle\Form;

use Gedmo\Mapping\Driver\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use function Symfony\Component\Validator\Tests\Constraints\choice_callback;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class BienType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('code',TextType::class,array(
        'required' =>true
    ))
            ->add('typeDeBien',choiceType::class,array(
                'required' =>false
            ))
            ->add('identifiant',TextType::class,array(
        'required' =>true
    ))
            ->add('adresse',TextareaType::class,array(
                'required' =>true
            ))
            ->add('batiment',TextType::class,array(
                'required' =>false
            ))
            ->add('escalier',TextType::class,array(
                'required' =>false
            ))
            ->add('etage',TextType::class,array(
                'required' =>false
            ))
            ->add('numPorte',TextType::class,array(
                'required' =>false
            ))
            ->add('ville',TextType::class,array(
                'required' =>false
            ))
            ->add('codePostal',TextType::class,array(
                'required' =>false
            ))
            ->add('superficie',TextType::class,array(
                'required' =>false
            ))
            ->add('nbreDePiece',IntegerType::class,array(
                'required' =>false
            ))
            ->add('nbreDeChambre',IntegerType::class,array(
                'required' =>false
            ))
            ->add('anneeDeConstruction',TextType::class,array(
                'required' =>false
            ))
            ->add('description',TextareaType::class,array(
                'required' =>false
            ))
            ->add('note',TextType::class,array(
                'required' =>false
            ))
            ->add('typeDeLocationPropose',ChoiceType::class,array(
                'required' =>false
            ))
            ->add('dureeMinimaleDeLocation',IntegerType::class,array(
                'required' =>false
            ))
            ->add('loyerHc',TextType::class,array(
                'required' =>false
            ))
            ->add('charge',TextType::class,array(
                'required' =>false
            ))
            ->add('typeHabitat',ChoiceType::class,array(
                'required' =>false
            ))
            ->add('regimeJuridique',TextType::class,array(
                'required' =>false
            ))
            ->add('designationsDesParties',ChoiceType::class,array(
                'required' =>false
            ))
            ->add('nomDuCentreImpot',TextType::class,array(
                'required' =>false
            ))
            ->add('adresses',TextareaType::class,array(
                'required' =>false
            ))
            ->add('photo',FileType::class,array(
                'required' =>false
            ))
            ->add('ville1',TextType::class,array(
                'required' =>false
            ))
            ->add('proprietaire',TextType::class,array(
                'required' =>false
            ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CS\MainBundle\Entity\Bien'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cs_mainbundle_bien';
    }


}
