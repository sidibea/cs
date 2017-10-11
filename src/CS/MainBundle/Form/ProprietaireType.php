<?php

namespace CS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProprietaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Particulier' => 'Particulier',
                    'Société / Autre' => 'Société'
                ),
                'expanded' => false,
                'required' => true,
                'placeholder' => '---',
            ))
            ->add('civilite', ChoiceType::class, array(
                'choices' => array(
                    'Homme' => 'm',
                    'Femme' => 'f',
                ),
                'placeholder' => '---',
                'expanded' => false,
                'required' => true
            ))
            ->add('prenom', TextType::class, array(
                'required' => true
            ))
            ->add('nom', TextType::class, array(
                'required' => true
            ))
            ->add('dateDeNaissance', DateType::class, array(
                'label' => 'DoB',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'input'  => 'datetime',
                'error_bubbling' => true
            ))
            ->add('lieuDeNaissance')
            ->add('photoFile', VichImageType::class, array(
                'required' => false
            ))
            ->add('adresse', TextareaType::class, array(
                'required' => true
            ))
            ->add('ville', TextType::class, array(
                'required' => true
            ))
            ->add('codePostal', TextType::class, array(
                'required' => true
            ))
            ->add('telephone', TextType::class, array(
                'required' => true
            ))
            ->add('fax', TextType::class, array(
                'required' => false
            ))
            ->add('mobile', TextType::class, array(
                'required' => true
            ))
            ->add('siteWeb', TextType::class, array(
                'required' => false
            ))
            ->add('commentaire', TextareaType::class, array(
                'required' => false
            ))
            ->add('societe', TextType::class, array(
                'required' => false
            ))
            ->add('noNif', TextType::class, array(
                'required' => false
            ))
            ->add('capital', TextType::class, array(
                'required' => false
            ))
            ->add('noNina', TextType::class, array(
                'required' => false
            ))
            ->add('logoFile', VichImageType::class, array(
                'required' => false
            ))
            ->add('banque', TextType::class, array(
                'required' => false
            ))
            ->add('adresseBanque', TextType::class, array(
                'required' => false
            ))
            ->add('villeBanque', TextType::class, array(
                'required' => false
            ))
            ->add('paysBanque', CountryType::class, array(
                'required' => false
            ))
            ->add('iban', TextType::class, array(
                'required' => false
            ))
            ->add('swift', TextType::class, array(
                'required' => false
            ))
            ->add('email', TextType::class, array(
                'required' => false
            ))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CS\MainBundle\Entity\Proprietaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cs_mainbundle_proprietaire';
    }


}
