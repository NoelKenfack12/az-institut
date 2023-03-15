<?php

namespace General\TemplateBundle\Entites;

use General\ValidatorBundle\Validatortext\Taillemin;

class Recherche
{
   /**
     *@Taillemin(valeur=3, message="Entrer au moins 3 caractès")
     */
    private $donnee;
	public function getDonnee()
	{
	return $this->donnee;
	}
	public function setDonnee($donnee)
	{
	$this->donnee = $donnee;
	}
}