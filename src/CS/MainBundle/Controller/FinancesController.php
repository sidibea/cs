<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/19/17
 * Time: 12:05 PM
 */

namespace CS\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FinancesController extends Controller{

    public function dashAction(){

        return $this->render('CSMainBundle:Finances:dash.html.twig');


    }

}