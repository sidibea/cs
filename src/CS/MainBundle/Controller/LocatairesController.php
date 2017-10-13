<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:29
 */

namespace CS\MainBundle\Controller;


use CS\MainBundle\Entity\Locataire;
use CS\MainBundle\Form\LocataireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocatairesController extends Controller
{

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Locataire')->findAll();

        return $this->render('CSMainBundle:Locataires:list.html.twig', [
            'list' => $list
        ]);


    }

    public function ajouterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $locataire = new Locataire();
        $form = $this->createForm(LocataireType::class,$locataire);

        return $this->render('CSMainBundle:Locataires:ajouter.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function editAction($id)
    {
        return $this->render('CSMainBundle:Locataires:edit.html.twig');

    }

    public function supprimerAction($id)
    {
        return $this->render('CSMainBundle:Locataires:supprimer.html.twig');
    }

    public function entrerAction($id)
    {
        return $this->render('CSMainBundle:Locataires:entrer.html.twig');

    }

    public function soldesAction($id)
    {
        return $this->render('CSMainBundle:Locataires:soldes.html.twig');

    }


    }