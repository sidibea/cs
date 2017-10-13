<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10/6/2017
 * Time: 4:31 PM
 */

namespace CS\MainBundle\Controller;


use CS\MainBundle\Entity\Immeubles;
use CS\MainBundle\Form\ImmeublesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImmeublesController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Immeubles')->findAll();

        return $this->render('CSMainBundle:Immeubles:list.html.twig',[
        'list' => $list
        ]);

    }

    public function ajouterAction()
    {
        $em = $this->getDoctrine()->getManager();
        $immeubles = new Immeubles();
        $form = $this->createForm(ImmeublesType::class, $immeubles);


        return $this->render('CSMainBundle:Immeubles:ajouter.html.twig', [
            'form' => $form->createView()
        ]);


    }

    public function editAction($id)
    {
        return $this->render('CSMainBundle:Immeubles:edit.html.twig');
    }
    public function supprimerAction($id)
    {
        return $this->render('CSMainBundle:Immeubles:supprimer.html.twig');
    }
    public function bilanAction($id)
    {
        return $this->render('CSMainBundle:Immeubles:bilan.html.twig');
    }
    public function financesAction($id)
    {
        return $this->render('CSMainBundle:Immeubles:finances.html.twig');
    }

}