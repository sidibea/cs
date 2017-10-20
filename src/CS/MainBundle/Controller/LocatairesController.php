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
use Symfony\Component\HttpFoundation\Request;

class LocatairesController extends Controller
{

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Locataire')->findAll();
        $data = $em->getRepository('CSMainBundle:Bien')->findLoyer(3);

        return $this->render('CSMainBundle:Locataires:list.html.twig', [
            'list' => $list
        ]);



    }

    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $locataire = new Locataire();
        $form = $this->createForm(LocataireType::class, $locataire);


        if($form->handleRequest($request)->isValid()){
            //$locataire->setCreatedAt(new \datetime);
            //$locataire->setUpdatedAt(new \datetime);
            //dump($form->get('dateNaissance')->getData()); exit;
            //$locataire->setDateNaissance(null);

            $em->persist($locataire);
            $em->flush();

            $locataire->setCode('L'.date('y').$locataire->getId());
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Le locataire a bien été enregistré.');

            return $this->redirect($this->generateUrl('cs_main_Locataires_list'));
        }

        return $this->render('CSMainBundle:Locataires:ajouter.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function editAction($id, Request $request)
    {

        return $this->render('CSMainBundle:Locataires:edit.html.twig');

    }

    public function voirAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $locataire = $em->getRepository('CSMainBundle:Locataire')->find($id);

        return $this->render('CSMainBundle:Locataires:voir.html.twig', [
            'locataire' => $locataire
        ]);


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