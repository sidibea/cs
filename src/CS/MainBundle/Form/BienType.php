<?php

namespace CS\MainBundle\Form;

use Doctrine\ORM\EntityRepository;
use Gedmo\Mapping\Driver\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use function Symfony\Component\Validator\Tests\Constraints\choice_callback;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BienType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('typeDeBien', ChoiceType::class, array(
                'choices' => array(
                    'Appartement' => 'Appartement',
                    'Maison individuelle' => 'Maison individuelle',
                    'Studio' => 'Studio',
                    'Local professionnel' => 'Local professionnel',
                    'Commerce' => 'Commerce',
                    'Bureaux' => 'Bureaux',
                    'Chambre' => 'Chambre',
                    'Entrepot' => 'Entreprot',
                    'Atelier' => 'Atelier',
                    'Chalet' => 'Chalet',
                    'Bureau partagé' => 'Bureau partagé'
                ),
                'expanded' => false,
                'required' => true,
                'placeholder' => '---',
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
            ->add('description', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    //...
                ),
            ))
            ->add('note', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    //...
                ),
            ))
            ->add('typeDeLocationPropose', ChoiceType::class,array(
                'choices' => array(
                    'Meublée' => 'Meublée',
                    'vide' => 'vide',
                    'Saisonnière' => 'Saisonnière',
                ),

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
            ->add('typeHabitat', ChoiceType::class,array(
                'choices' => array(
                    'Immeuble collectif' => 'Immeuble collectif',
                    'Immeuble individuel' => 'Immeuble individuel',
                ),

                'required' => false,
                'expanded' => true,
            ))

            ->add('regimeJuridique', ChoiceType::class,array(
                'choices' => array(
                    'Copropriété' => 'Copropriété',
                    'Mono propriété' => 'Mono propriété',
                ),
                'expanded' => true,
                'required' => false
            ))
            ->add('designationsDesParties', EntityType::class, [
                'class'        => 'CSMainBundle:DesignationPartie',
                'choice_label' => 'identifiant',
                'expanded'     => true,
                'multiple'     => true,
            ])
            ->add('nomDuCentreImpot',TextType::class,array(
                'required' =>false
            ))
            ->add('adresses',TextareaType::class,array(
                'required' =>false
            ))
            ->add('photoFile', VichImageType::class, array(
                'required' => false
            ))
            ->add('ville1',TextType::class,array(
                'required' =>false
            ))
            ->add('proprietaire', EntityType::class, array(
                'class' => 'CSMainBundle:Proprietaire',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.prenom', 'ASC');
                },
                'choice_label' => 'fullName',
                'placeholder' => 'Choisisser un proprietaire',
            ))
        ;
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
