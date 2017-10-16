<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/10/17
 * Time: 16:21
 */

namespace CS\MainBundle\Controller;


use CS\MainBundle\Entity\Bien;
use CS\MainBundle\Form\BienType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BiensController extends Controller
{
    public function listAction(){

        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Bien')->findAll();

        return $this->render('CSMainBundle:Biens:list.html.twig', [
            'list' => $list
        ]);


    }
    public function voirAction($id, Request $request){


        return $this->render('CSMainBundle:Biens:voir.html.twig');

    }

    public function bilanAction($id){
        return $this->render('CSMainBundle:Biens:bilan.html.twig');

    }

    public function archiveAction($id){
        return $this->render('CSMainBundle:Biens:archive.html.twig');

    }

    public function editAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $bien = $em->getRepository('CSMainBundle:Bien')->find($id);

        $form = $this->createForm(BienType::class, $bien);

        if($form->handleRequest($request)->isValid()){
            $bien->setUpdateAt(new \datetime);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Le bien a été modifié.');

            return $this->redirect($this->generateUrl('cs_main_Biens_list'));
        }

        return $this->render('CSMainBundle:Biens:edit.html.twig', [
            'form' => $form->createView(),
            'bien' => $bien
        ]);

    }
    public function supprimerAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();

        $bien = $em->getRepository('CSMainBundle:Bien')->find($id);

        if (null === $bien) {
            throw new NotFoundHttpException("Le bien avec l'id ".$id." n'existe pas.");
        }
        $em->remove($bien);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Le bien a été supprimé.');

        return $this->redirect($this->generateUrl('cs_main_Biens_list'));

    }
    public function inventairesAction($id){
        return $this->render('CSMainBundle:Biens:inventaires.html.twig');

    }
    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $bien = new Bien();

        $form = $this->createForm(BienType::class, $bien);

        if($form->handleRequest($request)->isValid()){
            $bien->setCreatedAt(new \datetime);
            $bien->setUpdateAt(new \datetime);

            $em->persist($bien);
            $em->flush();

            $bien->setCode('B'.date('y').$bien->getId());
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Le bien a été enregistré.');

            return $this->redirect($this->generateUrl('cs_main_Biens_list'));
        }

        return $this->render('CSMainBundle:Biens:ajouter.html.twig', [
            'form' => $form->createView()
        ]);

    }


}