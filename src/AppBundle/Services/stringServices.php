<?php
/**
 * Created by PhpStorm.
 * User: isamar
 * Date: 27/10/15
 * Time: 16:00
 */
namespace AppBundle\Services;
class stringServices
{
    private $_op1;
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

    public function min() /*String de Mayúsculas a Minúsculas*/
    {
        $this->setResult(strtolower($this->getOp1()));
    }

    public function may() /*String de Minúsculas a Mayúsculas*/
    {
        $this->setResult(strtoupper($this->getOp1()));
    }

    public function cmay() /*Convierte el primer carácter de una cadena a mayúsculas*/
    {
        $this->setResult(ucfirst($this->getOp1()));
    }

    public function count() /*Contar carácteres*/
    {

        $this->setResult(strlen($this->getOp1()));
    }

    public function inverse() /*Invierte una string*/
    {
        $this->setResult(strrev($this->getOp1()));
    }
}





