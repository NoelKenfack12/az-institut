<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

/**
 * Questionnaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\QuestionnaireRepository")
 */
class Questionnaire
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
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="reponsemultiple", type="boolean")
     */
    private $reponsemultiple;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Chapitrecours")
       * @ORM\JoinColumn(nullable=false)
        */
	private $chapitrecours;
   
   /**
         * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Proposition", mappedBy="questionnaire")
         */
    private $propositions;
	
	private $element;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->propositions = new \Doctrine\Common\Collections\ArrayCollection();
		$this->reponsemultiple = false;
		$this->valide = true;
	}
	
	public function getElement()
	{
		return $this->element;
	}
	
	public function setElement($element)
	{
		$this->element = $element;
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
     * @return Questionnaire
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
     * @return Questionnaire
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
     * Set chapitrecours
     *
     * @param \Produit\ProduitBundle\Entity\Chapitrecours $chapitrecours
     * @return Questionnaire
     */
    public function setChapitrecours(\Produit\ProduitBundle\Entity\Chapitrecours $chapitrecours)
    {
        $this->chapitrecours = $chapitrecours;

        return $this;
    }

    /**
     * Get chapitrecours
     *
     * @return \Produit\ProduitBundle\Entity\Chapitrecours 
     */
    public function getChapitrecours()
    {
        return $this->chapitrecours;
    }

    /**
     * Add propositions
     *
     * @param \Produit\ProduitBundle\Entity\Proposition $propositions
     * @return Questionnaire
     */
    public function addProposition(\Produit\ProduitBundle\Entity\Proposition $propositions)
    {
        $this->propositions[] = $propositions;

        return $this;
    }

    /**
     * Remove propositions
     *
     * @param \Produit\ProduitBundle\Entity\Proposition $propositions
     */
    public function removeProposition(\Produit\ProduitBundle\Entity\Proposition $propositions)
    {
        $this->propositions->removeElement($propositions);
    }

    /**
     * Get propositions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPropositions()
    {
        return $this->propositions;
    }

    /**
     * Set reponsemultiple
     *
     * @param boolean $reponsemultiple
     * @return Questionnaire
     */
    public function setReponsemultiple($reponsemultiple)
    {
        $this->reponsemultiple = $reponsemultiple;

        return $this;
    }

    /**
     * Get reponsemultiple
     *
     * @return boolean 
     */
    public function getReponsemultiple()
    {
        return $this->reponsemultiple;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     * @return Questionnaire
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean 
     */
    public function getValide()
    {
        return $this->valide;
    }
}
