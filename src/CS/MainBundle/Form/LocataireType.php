<?php

namespace CS\MainBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocataireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', SelectType::class,array(
                'required' => true
            ))

            ->add('civilite',SelectType::class,array(
                'required' => true
            ))

            ->add('prenom',TextType::class,array(
        'required' => true)
    )

            ->add('nom')
            ->add('dateNaissance')
            ->add('email')
            ->add('fax')
            ->add('mobile')
            ->add('adresse')
            ->add('codePostal')
            ->add('telephone')
            ->add('ville')
            ->add('societe')
            ->add('noTva')
            ->add('noNina')
            ->add('professionExercee')
            ->add('professionLocataire')
            ->add('revenus')
            ->add('situationProfession')
            ->add('adresseProfessionnel')
            ->add('villeProfessionnelle')
            ->add('telephoneProfessionel')
            ->add('notes')
            ->add('codeBanque')
            ->add('codeGuichet')
            ->add('numeroCompte')
            ->add('cleRib')
            ->add('banque')
            ->add('iban')
            ->add('swift')
            ->add('garants')        ;
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
