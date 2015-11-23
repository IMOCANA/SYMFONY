<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\calculatorServices;

class calculatorController extends Controller
{


    /**
     * @Route("/calculadora", name="calcu")
     */
    public function indexAction(Request $request) /*name="calcu" le pongo el nombre que quiera*/
    {
        // replace this example code with whatever you need
        return $this->render('base2Calculator.html.twig');
    }

    /**
     * @Route("/calculadora/sum", name="app_calculator_sumAction")
     */
    public function sumAction()
    {
        $action = $this->generateUrl('app_calculator_doSumAction');
        return $this->render('formularioCalculator.html.twig',
        array('action' => $action));
    }


    /**
     * @Route("/calculadora/sum/resultado", name="app_calculator_doSumAction")
     */
    public function doSumAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $op2= $request->request->get('op2');
        $calculadora = $this->get('calculator');
        $calculadora->setOp1($op1);
        $calculadora->setOp2($op2);
        $calculadora->sum();
        $result = $calculadora->getResult();
        return $this->render('resultadoCalculator.html.twig',
            array('resultado' => $result));
    }


    /**
     * @Route("/calculadora/subtract", name="app_calculator_subtractAction")
     */
    public function subtractAction()
    {
        $action = $this->generateUrl('app_calculator_doSubtractAction');
        return $this->render('formularioCalculator.html.twig',
            array('action' => $action));

    }


    /**
     * @Route("/calculadora/subtract/resultado", name="app_calculator_doSubtractAction")
     */
    public function doSubtractAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $op2= $request->request->get('op2');
        $calculadora = $this->get('calculator');
        $calculadora->setOp1($op1);
        $calculadora->setOp2($op2);
        $calculadora->subtract();
        $result = $calculadora->getResult();
        return $this->render('resultadoCalculator.html.twig',
            array('resultado' => $result));
    }


    /**
     * @Route("/calculadora/multiply", name="app_calculator_multiplyAction")
     */
    public function multiplyAction()
    {
        $action = $this->generateUrl('app_calculator_doMultiplyAction');
        return $this->render('formularioCalculator.html.twig',
            array('action' => $action));
    }


    /**
     * @Route("/calculadora/multiply/resultado", name="app_calculator_doMultiplyAction")
     */
    public function doMultiplyAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $op2= $request->request->get('op2');
        $calculadora = $this->get('calculator');
        $calculadora->setOp1($op1);
        $calculadora->setOp2($op2);
        $calculadora->multiply();
        $result = $calculadora->getResult();
        return $this->render('resultadoCalculator.html.twig',
            array('resultado' => $result));
    }


    /**
     * @Route("/calculadora/divide", name="app_calculator_divideAction")
     */
    public function divideAction()
    {
        $action = $this->generateUrl('app_calculator_doDivideAction');
        return $this->render('formularioCalculator.html.twig',
            array('action' => $action));
    }

    /**
     * @Route("/calculadora/divide/resultado", name="app_calculator_doDivideAction")
     */
    public function doDivideAction(Request $request)
    {
        $op1= $request->request->get('op1');
        $op2= $request->request->get('op2');
        $calculadora = $this->get('calculator');
        $calculadora->setOp1($op1);
        $calculadora->setOp2($op2);
        $calculadora->divide();
        $result = $calculadora->getResult();
        return $this->render('resultadoCalculator.html.twig',
            array('resultado' => $result));
    }
}