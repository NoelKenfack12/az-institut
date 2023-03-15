<?php
//(c) Noel Kenfack Novembre 2016
namespace General\ValidatorBundle\Validatortext;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use General\ServiceBundle\Servicetext\GeneralServicetext;

class TelephoneValidator extends ConstraintValidator
{
private $service;
public function __construct(GeneralServicetext $service)
{
$this->service = $service;
}
public function validate($value, Constraint $constraint)
{
if(!$this->service->telephone($value))
{
$this->context->addViolation($constraint->message, array('%string%' => $value));
}
}
}