<?php
namespace App\Validator\Validatortext;
use Symfony\Component\Validator\Constraint;
/**
* @Annotation
*/
class Telemail extends Constraint
{
public $message = "Contact %string% invalide";

public function validatedBy()
{
return 'adresse_telemail';
}
}