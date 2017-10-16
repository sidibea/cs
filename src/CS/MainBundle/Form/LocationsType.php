<?php

namespace CS\MainBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('bien', EntityType::class, array(
                'class' => 'CSMainBundle:Bien',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->orderBy('b.identifiant', 'ASC');
                },
                'choice_label' => 'fullName',
                'placeholder' => 'Choisisser un proprietaire',
            ))
            ->add('type',ChoiceType::class,array(
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
                'placeholder' => '---',
            ))
            ->add('utilisation',TextType::class,array(
                'required' =>false
            ))
            ->add('debutDuBail',TextType::class,array(
                'required' =>false
            ))
            ->add('finDuBail',TextType::class,array(
                'required' =>false
            ))
            ->add('paiement',TextType::class,array(
                'required' =>false
            ))
            ->add('dateDeQuittancement',TextType::class,array(
                'required' =>false
            ))
            ->add('generationDePaiement',TextType::class,array(
                'required' =>false
            ))
            ->add('loyerHc',TextType::class,array(
                'required' =>false
            ))
            ->add('charges',TextType::class,array(
                'required' =>false
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
            ->add('locataire',TextType::class,array(
                'required' =>false
            ))
            ->add('montantTravauxProprietaire',TextType::class,array(
                'required' =>false
            ))
            ->add('descriptionTravauxProprietaire',TextType::class,array(
                'required' =>false
            ))
            ->add('montantTravauxLocataire',TextType::class,array(
                'required' =>false
            ))
            ->add('descriptionTravauxLocataire',TextType::class,array(
                'required' =>false
            ))
            ->add('conditionParticuliere',TextType::class,array(
                'required' =>false
            ))
            ->add('commentaire',TextType::class,array(
                'required' =>false
            ))
            ->add('textePourLaQuittance',TextType::class,array(
                'required' =>false
            ))
            ->add('textePourLavisEcheance',TextType::class,array(
                'required' =>false
            ))
            ->add('loyerHcPremiereQuittance',TextType::class,array(
                'required' =>false
            ))
            ->add('chargesPremiereQuittance',TextType::class,array(
                'required' =>false
            ))
            ->add('dateDeFinDuMois',TextType::class,array(
                'required' =>false
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
