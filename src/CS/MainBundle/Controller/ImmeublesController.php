<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10/6/2017
 * Time: 4:31 PM
 */

namespace CS\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImmeublesController extends Controller
{
    public function listAction()
    {
        return $this->render('CSMainBundle:Immeubles:list.html.twig');
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