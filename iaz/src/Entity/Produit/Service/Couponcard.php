<?php

namespace App\Entity\Produit\Service;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Repository\Produit\Service\CouponcardRepository;
use App\Entity\Users\User\User;
use App\Entity\Produit\Produit\Panier;
use Doctrine\Common\Collections\Collection;

/**
 * Couponcard
 *
 * @ORM\Table("couponcard")
 * @ORM\Entity(repositoryClass=CouponcardRepository::class)
  * @UniqueEntity(fields="code", message="Ce  code existe déjà.")
 */
class Couponcard
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
     * @ORM\Column(name="titre", type="string", length=255, unique=true)
     *@Taillemin(valeur=3, message="Au moins 3 caractères")
     *@Taillemax(valeur=200, message="Au plus 200 caractès")
     */
    private $code;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="nbplace", type="integer")
     */
    private $nbplace;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="publique", type="boolean")
     */
    private $publique;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="revendeur", type="boolean")
     */
    private $revendeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
      * @ORM\ManyToOne(targetEntity=User::class)
      * @ORM\JoinColumn(nullable=true)
    */
    private $user;
	
	/**
     * @ORM\OneToMany(targetEntity=Panier::class, mappedBy="couponcard")
    */
    private $paniers;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->paniers = new \Doctrine\Common\Collections\ArrayCollection();
		$this->actif = true;
		$this->publique = false;
		$this->revendeur = false;
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
     * Set code
     *
     * @param string $code
     * @return Couponcard
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     * @return Couponcard
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Couponcard
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
     * Set user
     * @return Couponcard
     */
    public function setUser(User $user = null): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * Set nbplace
     *
     * @param integer $nbplace
     * @return Couponcard
     */
    public function setNbplace($nbplace)
    {
        $this->nbplace = $nbplace;

        return $this;
    }

    /**
     * Get nbplace
     *
     * @return integer 
     */
    public function getNbplace()
    {
        return $this->nbplace;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Couponcard
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set publique
     *
     * @param boolean $publique
     * @return Couponcard
     */
    public function setPublique($publique)
    {
        $this->publique = $publique;

        return $this;
    }

    /**
     * Get publique
     *
     * @return boolean 
     */
    public function getPublique()
    {
        return $this->publique;
    }

    /**
     * Set revendeur
     *
     * @param boolean $revendeur
     * @return Couponcard
     */
    public function setRevendeur($revendeur)
    {
        $this->revendeur = $revendeur;

        return $this;
    }

    /**
     * Get revendeur
     *
     * @return boolean 
     */
    public function getRevendeur()
    {
        return $this->revendeur;
    }

    /**
     * Add paniers
     * @return Couponcard
     */
    public function addPanier(Panier $paniers): self
    {
        $this->paniers[] = $paniers;

        return $this;
    }

    /**
     * Remove paniers
     */
    public function removePanier(Panier $paniers)
    {
        $this->paniers->removeElement($paniers);
    }

    /**
     * Get paniers 
     */
    public function getPaniers(): ?Collection
    {
        return $this->paniers;
    }
}
