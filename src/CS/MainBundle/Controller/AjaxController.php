<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/17/17
 * Time: 12:23 PM
 */

namespace CS\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends Controller {

    public function bienAction( Request $request){
        $em = $this->getDoctrine()->getManager();
        $data = array();

            $id = $request->request->get('id');

            if ($id != null)
            {
                $data = $em->getRepository('CSMainBundle:Bien')->findLoyer($id);

                return new JsonResponse($data);
            }
        return new JsonResponse($data);

    }

}