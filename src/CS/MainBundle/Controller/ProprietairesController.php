<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10/6/2017
 * Time: 4:22 PM
 */

namespace CS\MainBundle\Controller;


use CS\MainBundle\Entity\Proprietaire;
use CS\MainBundle\Form\ProprietaireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProprietairesController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Proprietaire')->findAll();

        return $this->render('CSMainBundle:Proprietaires:list.html.twig', [
            'list' => $list
        ]);
    }
    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $proprietaire = new Proprietaire();

        $form = $this->createForm(ProprietaireType::class, $proprietaire);

        if($form->handleRequest($request)->isValid()){
            $proprietaire->setCreatedAt(new \datetime);
            $proprietaire->setUpdatedAt(new \datetime);

            $em->persist($proprietaire);
            $em->flush();

            $proprietaire->setCode('P'.date('Y').$proprietaire->getId());
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Le proprietaire a été enregistré.');

            return $this->redirect($this->generateUrl('cs_main_Proprietaires_list'));
        }

        return $this->render('CSMainBundle:Proprietaires:ajouter.html.twig', [
            'form' => $form->createView()
        ]);


    }
    public function editAction($id)
    {
        return $this->render('CSMainBundle:Proprietaires:edit.html.twig');
    }
    public function bilanAction($id)
    {
        return $this->render('CSMainBundle:Proprietaires:bilan.html.twig');
    }
    public function mandatAction($id)
    {
        return $this->render('CSMainBundle:Proprietaires:mandat.html.twig');
    }
    public function supprimerAction($id)
    {
        return $this->render('CSMainBundle:Proprietaires:supprimer.html.twig');
    }
    public function voirAction($id)
    {
        return $this->render('CSMainBundle:Proprietaires:voir.html.twig');
    }

}