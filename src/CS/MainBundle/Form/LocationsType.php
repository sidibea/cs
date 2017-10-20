<?php

namespace CS\MainBundle\Form;

use Doctrine\ORM\EntityRepository;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class LocationsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('biens', EntityType::class, array(
                'class' => 'CSMainBundle:Bien',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->orderBy('b.identifiant', 'ASC');
                },
                'choice_label' => 'identifiant',
                'placeholder' => 'Choisisser un bien',
            ))
            ->add('type', ChoiceType::class,array(
                'choices' => array(
                    'Bail dhabitation vide' => 'Bail dhabitation vide',
                    'Bail dhabitation meublé' => 'Bail dhabitation meublé',
                    'Bail location saisonnière' => 'Bail location saisonnière',
                    'Bail parking/garage' => 'Bail parking/garage',
                    'Bail mixte' => 'Bail mixte',
                    'Bail commercial' => 'Bail commercial',
                    'Bail professionnels' => 'Bail professionnels',
                    'Bail rural' => 'Bail rural',
                    'Bail precaire' => 'Bail precaire',
                    'Bail meublé etudiant' => 'Bail meublé etudiant',
                    'Autres' => 'Autres',
                ),
                'expanded' => false,
                'required' => true,
            ))
            ->add('utilisation', ChoiceType::class,array(
                'choices' => array(
                    'Résidence principale du locataire' => 'Résidence principale du locataire',
                    'Résidence secondaire du locataire' => 'Résidence secondaire du locataire',
                    'Le locataire est autorisé à exercer son activité professionnelle, à l\'exclusion, cependant, de toute activité commerciale, artisanale ou industrielle' => 'Activité professionnelle'
                ),
                'expanded' => true,
                'required' => true,
                'attr' => [
                    'class' => 'minimal'
                ]
            ))
            ->add('debutDuBail', DateType::class, array(
                'label' => 'DoB',
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'input'  => 'datetime',
                'error_bubbling' => true
            ))
            ->add('finDuBail', DateType::class, array(
                'label' => 'DoB',
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'input'  => 'datetime',
                'error_bubbling' => true
            ))
            ->add('paiement', ChoiceType::class,array(
                'choices' => array(
                    'Mensuel' => 'Mensuel',
                    'Bimestriel' => 'Résidence secondaire du locataire',
                    'Trimestriel' => 'Activité professionnelle',
                    'Semestriel' => 'Semestriel',
                    'Annuel' => 'Annuel',
                    'Forfetaire' => 'Forfetaire'
                ),
                'expanded' => false,
                'required' => false,
                'attr' => [
                    'class' => 'mini mal'
                ]
            ))
            ->add('dateDeQuittancement', ChoiceType::class,array(
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '19' => '19',
                    '20' => '20',
                    '21' => '21',
                    '22' => '22',
                    '23' => '23',
                    '24' => '24',
                    '25' => '25',
                    '26' => '26',
                    '27' => '27',
                    '28' => '28',
                    '29' => '29',
                    '30' => '30',
                    '31' => '31'
                ),
                'expanded' => false,
                'required' => false,
                'attr' => [
                    'class' => 'minimal'
                ]
            ))
            ->add('generationDePaiement',TextType::class,array(
                'required' =>false
            ))
            ->add('loyerHc',TextType::class,array(
                'required' =>true
            ))
            ->add('charges',TextType::class,array(
                'required' =>true
            ))
            ->add('fraisDeRetard',TextType::class,array(
                'required' =>false
            ))
            ->add('depotDeGaranti',TextType::class,array(
                'required' =>false
            ))
            ->add('autresDepots',TextType::class,array(
                'required' =>false
            ))
            ->add('locataire', EntityType::class, array(
                'class' => 'CSMainBundle:Locataire',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.prenom', 'ASC');
                },
                'choice_label' => 'fullName',
                'placeholder' => 'Choisisser un locataire',
            ))
            ->add('montantTravauxProprietaire',TextType::class,array(
                'required' =>false
            ))
            ->add('descriptionTravauxProprietaire',CKEditorType::class,array(
                'required' =>false
            ))
            ->add('montantTravauxLocataire',TextType::class,array(
                'required' =>false
            ))
            ->add('descriptionTravauxLocataire',CKEditorType::class,array(
                'required' =>false
            ))
            ->add('conditionParticuliere',CKEditorType::class,array(
                'required' =>false
            ))
            ->add('commentaire',CKEditorType::class,array(
                'required' =>false
            ))
            ->add('textePourLaQuittance',CKEditorType::class,array(
                'required' =>false
            ))
            ->add('textePourLavisEcheance',CKEditorType::class,array(
                'required' =>false
            ))
            ->add('loyerHcPremiereQuittance',TextType::class,array(
                'required' =>false
            ))
            ->add('chargesPremiereQuittance',TextType::class,array(
                'required' =>false
            ))
            ->add('dateDeFinDuMois', DateType::class, array(
                'label' => 'DoB',
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'input'  => 'datetime',
                'error_bubbling' => true,
                'required' => false
            ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CS\MainBundle\Entity\Locations'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cs_mainbundle_locations';
    }


}
