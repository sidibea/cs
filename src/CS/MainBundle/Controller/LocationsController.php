<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/10/17
 * Time: 16:31
 */

namespace CS\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocationsController extends Controller
{
    public function listAction(){
        return $this->render('CSMainBundle:Locations:list.html.twig');

    }

    public function ajouterAction()
    {
        return $this->render('CSMainBundle:Locations:ajouter.html.twig');

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