<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/10/17
 * Time: 11:21
 */

namespace CS\MainBundle\Controller;


use CS\MainBundle\Entity\Terrain;
use CS\MainBundle\Form\TerrainType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TerrainsController extends Controller
{
    public function listAction(){

        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Terrain')->findAll();

        return $this->render('CSMainBundle:Terrains:list.html.twig', [
            'list' => $list
        ]);


    }

    public function ajouterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $terrain = new Terrain();
        $form = $this->createForm(TerrainType::class, $terrain);


        return $this->render('CSMainBundle:Terrains:ajouter.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function voirAction($id){
        return $this->render('CSMainBundle:Terrains:voir.html.twig');

    }


    public function bilanAction($id){
        return $this->render('CSMainBundle:Terrains:bilan.html.twig');

    }

    public function archiveAction($id){
        return $this->render('CSMainBundle:Terrains:archive.html.twig');

    }

    public function editAction($id){
        return $this->render('CSMainBundle:Terrains:edit.html.twig');
    }

    public function supprimerAction($id){
        return $this->render('CSMainBundle:Terrains:supprimer.html.twig');

    }

}