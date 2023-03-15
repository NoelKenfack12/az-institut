<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Caracteristique
 *
 * @ORM\Table("caracteristique")
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\CaracteristiqueRepository")
 */
class Caracteristique
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
     * @ORM\Column(name="nom", type="string", length=255)
     *@Taillemin(valeur=2, message="Au moins 2 caractères")
     *@Taillemax(valeur=250, message="Au plus 250 caractès")
     */
    private $nom;
	
	/**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     *@Taillemax(valeur=800, message="Au plus 800 caractès")
     */
    private $description;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     *@Taillemin(valeur=2, message="Au moins 2 caractères")
     *@Taillemax(valeur=250, message="Au plus 250 caractès")
     */
    private $icon;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Souscategorie", inversedBy="caracteristiques")
       * @ORM\JoinColumn(nullable=false)
        */
	private $souscategorie;
	
	/**
     * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Caracteristiqueproduit", mappedBy="caracteristique")
     */
    private $caracteristiqueproduits;

    /**
      * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
      * @ORM\JoinColumn(nullable=false)
      */
      private $user;

    public function __construct()
	{
		$this->date = new \Datetime();
		$this->rang = 0;
		$this->caracteristiqueproduits = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Caracteristique
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Caracteristique
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
     * Set icon
     *
     * @param string $icon
     * @return Caracteristique
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set user
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Caracteristique
     */
    public function setUser(\Users\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Users\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Caracteristique
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set souscategorie
     *
     * @param \Produit\ProduitBundle\Entity\Souscategorie $souscategorie
     * @return Caracteristique
     */
    public function setSouscategorie(\Produit\ProduitBundle\Entity\Souscategorie $souscategorie)
    {
        $this->souscategorie = $souscategorie;
		$souscategorie->addCaracteristique($this);

        return $this;
    }

    /**
     * Get souscategorie
     *
     * @return \Produit\ProduitBundle\Entity\Souscategorie 
     */
    public function getSouscategorie()
    {
        return $this->souscategorie;
    }

    /**
     * Add caracteristiqueproduits
     *
     * @param \Produit\ProduitBundle\Entity\Caracteristiqueproduit $caracteristiqueproduits
     * @return Caracteristique
     */
    public function addCaracteristiqueproduit(\Produit\ProduitBundle\Entity\Caracteristiqueproduit $caracteristiqueproduits)
    {
        $this->caracteristiqueproduits[] = $caracteristiqueproduits;

        return $this;
    }

    /**
     * Remove caracteristiqueproduits
     *
     * @param \Produit\ProduitBundle\Entity\Caracteristiqueproduit $caracteristiqueproduits
     */
    public function removeCaracteristiqueproduit(\Produit\ProduitBundle\Entity\Caracteristiqueproduit $caracteristiqueproduits)
    {
        $this->caracteristiqueproduits->removeElement($caracteristiqueproduits);
    }

    /**
     * Get caracteristiqueproduits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCaracteristiqueproduits()
    {
        return $this->caracteristiqueproduits;
    }

    /**
     * Set rang
     *
     * @param integer $rang
     * @return Caracteristique
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return integer 
     */
    public function getRang()
    {
        return $this->rang;
    }
}
