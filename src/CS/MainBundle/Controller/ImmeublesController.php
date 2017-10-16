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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $immeubles = new Immeubles();
        $form = $this->createForm(ImmeublesType::class, $immeubles);

        if($form->handleRequest($request)->isValid()){

            $immeubles->setCreatedAt(new \datetime);
            $immeubles->setUpdatedAt(new \datetime);
            $em->persist($immeubles);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Le bien a été enregistré.');

            return $this->redirect($this->generateUrl('cs_main_Immeubles_list'));
        }


            return $this->render('CSMainBundle:Immeubles:ajouter.html.twig', [
            'form' => $form->createView()
        ]);


    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $immeuble = $em->getRepository('CSMainBundle:Immeubles')->find($id);
        $form = $this->createForm(ImmeublesType::class, $immeuble);

        if($form->handleRequest($request)->isValid()){

            $immeuble->setUpdatedAt(new \datetime);

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'L\'immeuble a été modifié.');

            return $this->redirect($this->generateUrl('cs_main_Immeubles_list'));
        }

        return $this->render('CSMainBundle:Immeubles:edit.html.twig', [
            'immeuble' => $immeuble,
            'form' => $form->createView()
        ]);
    }
    public function supprimerAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $immeuble = $em->getRepository('CSMainBundle:Immeubles')->find($id);

        if (null === $immeuble) {
            throw new NotFoundHttpException("Le proprietaire avec l'id ".$id." n'existe pas.");
        }
        $em->remove($immeuble);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'L\'immeuble a été supprimé.');

        return $this->redirect($this->generateUrl('cs_main_Immeubles_list'));
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