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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TerrainsController extends Controller
{
    public function listAction(){

        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('CSMainBundle:Terrain')->findAll();

        return $this->render('CSMainBundle:Terrains:list.html.twig', [
            'list' => $list
        ]);


    }

    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $terrain = new Terrain();
        $form = $this->createForm(TerrainType::class, $terrain);

        if($form->handleRequest($request)->isValid()){
            $terrain->setCreatedAt(new \datetime);
            $terrain->setUpdatedAt(new \datetime);

            $em->persist($terrain);
            $em->flush();

            $terrain->setCode('T'.date('y').$terrain->getId());
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Le terrain a été enregistré.');

            return $this->redirect($this->generateUrl('cs_main_Terrains_list'));
        }


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

    public function editAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $terrain = $em->getRepository('CSMainBundle:Terrain')->find($id);

        $form = $this->createForm(TerrainType::class, $terrain);

        if($form->handleRequest($request)->isValid()){
            $terrain->setUpdatedAt(new \datetime);

            $em->flush();


            $request->getSession()->getFlashBag()->add('notice', 'Le terrain a été modifié.');

            return $this->redirect($this->generateUrl('cs_main_Terrains_list'));
        }

        return $this->render('CSMainBundle:Terrains:edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function supprimerAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();

        $terrain = $em->getRepository('CSMainBundle:Terrain')->find($id);

        if (null === $terrain) {
            throw new NotFoundHttpException("Le terrain avec l'id ".$id." n'existe pas.");
        }
        $em->remove($terrain);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Le terrain a été supprimé.');

        return $this->redirect($this->generateUrl('cs_main_Terrains_list'));

    }

}