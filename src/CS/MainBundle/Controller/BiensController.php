<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/10/17
 * Time: 16:21
 */

namespace CS\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BiensController extends Controller
{
    public function listAction(){
        return $this->render('CSMainBundle:Biens:list.html.twig');

    }
    public function voirAction($id){
        return $this->render('CSMainBundle:Biens:voir.html.twig');

    }

    public function bilanAction($id){
        return $this->render('CSMainBundle:Biens:bilan.html.twig');

    }

    public function archiveAction($id){
        return $this->render('CSMainBundle:Biens:archive.html.twig');

    }

    public function editAction($id){
        return $this->render('CSMainBundle:Biens:edit.html.twig');

}
    public function supprimerAction($id){
        return $this->render('CSMainBundle:Biens:supprimer.html.twig');

}
    public function inventairesAction($id){
        return $this->render('CSMainBundle:Biens:inventaires.html.twig');

    }
    public function ajouterAction()
    {   return $this->render('CSMainBundle:Biens:ajouter.html.twig');

    }


}