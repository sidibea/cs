<?php

namespace CS\MainBundle\Form;

//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Ldap\Adapter\ExtLdap\Collection;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class LocataireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class,array(
                'required' => true,
                'choices' => array(
                    'Particulier' => 'Particulier',
                    'Société / Autre' => 'Société'
                ),
                'expanded' => false,
                'placeholder' => '---',
            ))

            ->add('civilite',ChoiceType::class, array(
                    'choices' => array(
                        'Homme' => 'm',
                        'Femme' => 'f',
                    ),
                    'placeholder' => '---',
                    'expanded' => false,
                    'required' => true
                )
            )

            ->add('prenom',TextType::class,array(
        'required' => true)
    )

            ->add('nom', TextType::class,array(
                'required' =>false))

            ->add('dateNaissance', BirthdayType::class, array(
                'placeholder' => array(
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                ),
                'format' => 'dd-MM-yyyy',
                'input' => 'string'
            ))
            ->add('email', TextType::class,array(
                'required' =>false
            ))

            ->add('fax', TextType::class,array(
                'required' =>false
            ))

            ->add('mobile', TextType::class,array(
                'required' =>false
            ))

            ->add('adresse',TextType::class,array(
                'required' =>false
            ))
            ->add('lieuDeNaissance',TextType::class,array(
                'required' =>false
            ))

            ->add('codePostal',TextType::class,array(
                'required' =>false
            ))
            ->add('photoFile', VichImageType::class, array(
                'required' => false
            ))

            ->add('telephone', TextType::class,array(
                'required' =>false
            ))
            ->add('ville',TextType::class,array(
                'required' =>false
            ))
            ->add('societe', TextType::class,array(
                'required' =>false
            ))

            ->add('noTva', TextType::class,array(
                'required' =>false
            ))

            ->add('noNina', TextType::class,array(
                'required' =>false
            ))

            ->add('professionExercee', TextType::class,array(
                'required' =>false
            ))
            ->add('professionLocataire',TextType::class,array(
                'required' =>false
            ))

            ->add('revenus', TextType::class,array(
                'required' =>false
            ))

            ->add('situationProfession', TextType::class,array(
                'required' =>false
            ))

            ->add('adresseProfessionnel',TextType::class,array(
                'required' =>false
            ))
            ->add('villeProfessionnelle', TextType::class,array(
                'required' =>false
            ))
            ->add('telephoneProfessionel', TextType::class,array(
                'required' =>false
            ))
            ->add('notes', CKEditorType::class , array(
                'required' =>false
            ))
            ->add('codeBanque', TextType::class,array(
                'required' =>false
            ))
            ->add('codeGuichet', TextType::class,array(
                'required' =>false
            ))
            ->add('numeroCompte', TextType::class,array(
                'required' =>false
            ))
            ->add('cleRib',TextType::class,array(
                'required' =>false
            ))
            ->add('banque',TextType::class,array(
                'required' =>false
            ))
            ->add('iban', TextType::class,array(
                'required' =>false
            ))
            ->add('swift',TextType::class,array(
                'required' =>false
            ))
           ->add('garants', CollectionType::class, array(
                'entry_type' => GarantsType::class,
                'allow_add' => true,
                'prototype' => true,

            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CS\MainBundle\Entity\Locataire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cs_mainbundle_locataire';
    }


}
