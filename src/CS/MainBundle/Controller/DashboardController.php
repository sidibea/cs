<?php

namespace CS\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DashboardController extends Controller
{

    public function indexAction()
    {
        return $this->render('CSMainBundle::dashboard.html.twig');
    }

    public function boxesAction(){


        return $this->render('CSMainBundle:includes:boxes.html.twig');
    }


}
