<?php
//(c) Noel Kenfack Novembre 2014 (propriété de zentsoft entreprise)
namespace General\ValidatorBundle\Validatortext;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use General\ServiceBundle\Servicetext\GeneralServicetext;

class SitewebValidator extends ConstraintValidator
{
private $service;
public function __construct(GeneralServicetext $service)
{
$this->service = $service;
}
public function validate($value, Constraint $constraint)
{
if(!$this->service->siteweb($value))
{
$this->context->addViolation($constraint->message, array('%string%' => $value));
}
}
}