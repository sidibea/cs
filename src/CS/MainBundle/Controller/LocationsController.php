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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LocationsController extends Controller
{
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Locations')->findAll();

        return $this->render('CSMainBundle:Locations:list.html.twig', [
            'list' => $list
        ]);


    }

    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $locations = new Locations();
        $form = $this->createForm(LocationsType::class, $locations);

        if($form->handleRequest($request)->isValid()){

            $locations->setCreatedAt(new \datetime);
            $locations->setUpdatedAt(new \datetime);
            //$locations->setDebutDuBail()
            $locations->setActive(true);


            $em->persist($locations);
            $em->flush();

            $locations->setCode($locations->getLocataire()->getCode().$locations->getId());
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'La location a été enregistré.');

            return $this->redirect($this->generateUrl('cs_main_Locations_list'));

        }


        return $this->render('CSMainBundle:Locations:ajouter.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function editAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $locations = $em->getRepository('CSMainBundle:Locations')->find($id);
        $form = $this->createForm(LocationsType::class, $locations);

        if($form->handleRequest($request)->isValid()){

            $locations->setUpdatedAt(new \datetime);
            //$locations->setDebutDuBail()


            $em->flush();

            $locations->setCode($locations->getLocataire()->getCode().$locations->getId());
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'La location a été enregistré.');

            return $this->redirect($this->generateUrl('cs_main_Locations_list'));

        }

        return $this->render('CSMainBundle:Locations:edit.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function supprimerAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();

        $locations = $em->getRepository('CSMainBundle:Locations')->find($id);

        if (null === $locations) {
            throw new NotFoundHttpException("La location avec l'id ".$id." n'existe pas.");
        }
        $em->remove($locations);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'La location a été supprimée.');

        return $this->redirect($this->generateUrl('cs_main_Locations_list'));

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