<?php
/**
* 
*/
/**
* Encoding interface
*/
namespace General\ServiceBundle\AfMail;

interface iEncoding
{
    public function encode($input);
    public function getType();
}