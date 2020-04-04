<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

/**
 * Proposition
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\PropositionRepository")
 */
class Proposition
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="text")
     *@Taillemin(valeur=3, message="Au moins 3 caractères")
     *@Taillemax(valeur=250, message="Au plus 250 caractès")
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="reponse", type="boolean")
     */
    private $reponse;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Questionnaire", inversedBy="propositions")
       * @ORM\JoinColumn(nullable=false)
        */
	private $questionnaire;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->reponse = false;
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Proposition
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Proposition
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set questionnaire
     *
     * @param \Produit\ProduitBundle\Entity\Questionnaire $questionnaire
     * @return Proposition
     */
    public function setQuestionnaire(\Produit\ProduitBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaire = $questionnaire;
		$questionnaire->addProposition($this);

        return $this;
    }

    /**
     * Get questionnaire
     *
     * @return \Produit\ProduitBundle\Entity\Questionnaire 
     */
    public function getQuestionnaire()
    {
        return $this->questionnaire;
    }

    /**
     * Set reponse
     *
     * @param boolean $reponse
     * @return Proposition
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return boolean 
     */
    public function getReponse()
    {
        return $this->reponse;
    }
}
