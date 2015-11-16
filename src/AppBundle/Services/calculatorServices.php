<?php
/**
 * Created by PhpStorm.
 * User: isamar
 * Date: 27/10/15
 * Time: 16:00
 */
namespace AppBundle\Services;
class calculatorServices
{
    private $_op1;
    private $_op2;
    private $_result;


    /**
     * @return mixed
     */
    public function getOp1()
    {
        return $this->_op1;
    }

    /**
     * @param mixed $op1
     */
    public function setOp1($op1)
    {
        $this->_op1 = $op1;
    }

    /**
     * @return mixed
     */
    public function getOp2()
    {
        return $this->_op2;
    }

    /**
     * @param mixed $op2
     */
    public function setOp2($op2)
    {
        $this->_op2 = $op2;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->_result;
    }


    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->_result = $result;
    }

    public function sum()
    {
        $this->setResult($this->getOp1() + $this->getOp2());
    }
    public function subtract()
    {
        $this->setResult($this->getOp1() - $this->getOp2());
    }
    public function multiply()
    {
        $this->setResult($this->getOp1() * $this->getOp2());
    }
    public function divide()
    {
        $this->setResult($this->getOp1() / $this->getOp2());
    }


}