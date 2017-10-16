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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

            $proprietaire->setCode('P'.date('y').$proprietaire->getId());
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Le proprietaire a été enregistré.');

            return $this->redirect($this->generateUrl('cs_main_Proprietaires_list'));
        }

        return $this->render('CSMainBundle:Proprietaires:ajouter.html.twig', [
            'form' => $form->createView()
        ]);


    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $proprietaire = $em->getRepository('CSMainBundle:Proprietaire')->find($id);

        $form = $this->createForm(ProprietaireType::class, $proprietaire);

        if($form->handleRequest($request)->isValid()){
            $proprietaire->setUpdatedAt(new \datetime);

            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Le proprietaire a été modifié.');

            return $this->redirect($this->generateUrl('cs_main_Proprietaires_list'));

        }

        return $this->render('CSMainBundle:Proprietaires:edit.html.twig', [
            'form' => $form->createView(),
            'proprietaire' => $proprietaire
        ]);
    }
    public function bilanAction($id)
    {
        return $this->render('CSMainBundle:Proprietaires:bilan.html.twig');
    }
    public function mandatAction($id)
    {
        return $this->render('CSMainBundle:Proprietaires:mandat.html.twig');
    }
    public function supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $proprietaire = $em->getRepository('CSMainBundle:Proprietaire')->find($id);

        if (null === $proprietaire) {
            throw new NotFoundHttpException("Le proprietaire avec l'id ".$id." n'existe pas.");
        }
        $em->remove($proprietaire);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Le proprietaire a été supprimé.');

        return $this->redirect($this->generateUrl('cs_main_Proprietaires_list'));



        /*// On boucle sur les catégories de l'annonce pour les supprimer
        foreach ($proprietaire->getCategories() as $category) {
        }*/


    }
    public function voirAction($id)
    {
        return $this->render('CSMainBundle:Proprietaires:voir.html.twig');
    }

}