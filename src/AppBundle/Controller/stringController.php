<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\stringServices;

class stringController extends Controller
{
    /**
     * @Route("/string", name="homepage2")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('indexString.html.twig');
    }

    /**
     * @Route("/sring/min", name="app_string_minAction")
     */
    public function minAction()
    {
        $action = $this->generateUrl('app_string_doMinAction');
        return $this->render('formularioString.html.twig',
            array('action' => $action));
    }


    /**
     * @Route("/string/min/resultado", name="app_string_doMinAction")
     */
    public function doMinAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $string = $this->get('string');/*string en verde es el nombe que le he dado en services.yml y $string lo llamo yo así*/
        $string->setOp1($op1);
        $string->min();
        $result = $string->getResult();
        return $this->render('resultadoString.html.twig',
            array('resultado' => $result));
    }


    /**
     * @Route("/sring/may", name="app_string_mayAction")
     */
    public function mayAction()
    {
        $action = $this->generateUrl('app_string_doMayAction');
        return $this->render('formularioString.html.twig',
            array('action' => $action));
    }

    /**
     * @Route("/string/may/resultado", name="app_string_doMayAction")
     */
    public function doMayAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $string = $this->get('string');/*string en verde es el nombe que le he dado en services.yml y $string lo llamo yo así*/
        $string->setOp1($op1);
        $string->may();
        $result = $string->getResult();
        return $this->render('resultadoString.html.twig',
            array('resultado' => $result));
    }


    /**
     * @Route("/sring/cmay", name="app_string_cmayAction")
     */
    public function cmayAction()
    {
        $action = $this->generateUrl('app_string_doCmayAction');
        return $this->render('formularioString.html.twig',
            array('action' => $action));
    }

    /**
     * @Route("/string/cmay/resultado", name="app_string_doCmayAction")
     */
    public function doCmayAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $string = $this->get('string');/*string en verde es el nombe que le he dado en services.yml y $string lo llamo yo así*/
        $string->setOp1($op1);
        $string->cmay();
        $result = $string->getResult();
        return $this->render('resultadoString.html.twig',
            array('resultado' => $result));
    }



    /**
     * @Route("/sring/count", name="app_string_countAction")
     */
    public function countAction()
    {
        $action = $this->generateUrl('app_string_doCountAction');
        return $this->render('formularioString.html.twig',
            array('action' => $action));
    }

    /**
     * @Route("/string/count/resultado", name="app_string_doCountAction")
     */
    public function doCountAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $string = $this->get('string');/*string en verde es el nombe que le he dado en services.yml y $string lo llamo yo así*/
        $string->setOp1($op1);
        $string->count();
        $result = $string->getResult();
        return $this->render('resultadoString.html.twig',
            array('resultado' => $result));
    }


    /**
     * @Route("/sring/inverse", name="app_string_inverseAction")
     */
    public function inverseAction()
    {
        $action = $this->generateUrl('app_string_doInverseAction');
        return $this->render('formularioString.html.twig',
            array('action' => $action));
    }

    /**
     * @Route("/string/inverse/resultado", name="app_string_doInverseAction")
     */
    public function doInverseAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $string = $this->get('string');/*string en verde es el nombe que le he dado en services.yml y $string lo llamo yo así*/
        $string->setOp1($op1);
        $string->inverse();
        $result = $string->getResult();
        return $this->render('resultadoString.html.twig',
            array('resultado' => $result));
    }
}