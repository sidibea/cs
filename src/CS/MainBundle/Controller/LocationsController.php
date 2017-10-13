<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/10/17
 * Time: 16:31
 */

namespace CS\MainBundle\Controller;


use CS\MainBundle\Entity\Locations;
use CS\MainBundle\Form\LocationsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocationsController extends Controller
{
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Locations')->findAll();

        return $this->render('CSMainBundle:Locations:list.html.twig', [
            'list' => $list
        ]);


    }

    public function ajouterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $locations=new Locations();
        $form = $this->createForm(LocationsType::class, $locations);


        return $this->render('CSMainBundle:Locations:ajouter.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function editAction($id){
        return $this->render('CSMainBundle:Locations:edit.html.twig');

    }

    public function supprimerAction($id){
        return $this->render('CSMainBundle:Locations:supprimer.html.twig');

    }

    public function desactiverAction($id){
        return $this->render('CSMainBundle:Locations:deactiver.html.twig');

    }

    public function archiverAction($id){
        return $this->render('CSMainBundle:Locations:archiver.html.twig');

    }
    public function contratAction($id){
        return $this->render('CSMainBundle:Locations:contrat.html.twig');

    }
    public function departAction($id){
        return $this->render('CSMainBundle:Locations:depart.html.twig');

    }
    public function entrerAction($id){
        return $this->render('CSMainBundle:Locations:entrer.html.twig');

    }
}