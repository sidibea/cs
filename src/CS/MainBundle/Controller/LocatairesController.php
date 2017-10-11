<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:29
 */

namespace CS\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocatairesController extends Controller
{

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Locataires')->findAll();

        return $this->render('CSMainBundle:Locataire:list.html.twig', [
            'list' => $list
        ]);


    }

    public function ajouterAction()
    {
        return $this->render('CSMainBundle:Locataires:ajouter.html.twig');

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