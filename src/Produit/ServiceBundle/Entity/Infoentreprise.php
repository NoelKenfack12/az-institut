<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use General\ValidatorBundle\Validatortext\Siteweb;
use General\ServiceBundle\Servicetext\GeneralServicetext;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Infoentreprise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\InfoentrepriseRepository")
 */
class Infoentreprise
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
     * @ORM\Column(name="titre", type="string", length=255,nullable=true)
     *@Taillemax(valeur=300, message="Au plus 300 caractès")
     */
    private $titre;
	
	/**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255,nullable=true)
     *@Siteweb(message="Lien invalide")
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
      *@Taillemax(valeur=500, message="Au plus 500 caractès")
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
     * @ORM\Column(name="timestamp", type="bigint")
     */
    private $timestamp;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="principal", type="boolean")
     */
    private $principal;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="valeur", type="boolean")
     */
    private $valeur;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=false)
        */
	private $user;
	
	/**
           * @ORM\OneToOne(targetEntity="Produit\ServiceBundle\Entity\Imginfoentreprise",  cascade={"persist","remove"})
           * @ORM\JoinColumn(nullable=true)
	*@Assert\Valid()
          */
	private $imginfoentreprise;
	
	/**
         * @ORM\OneToMany(targetEntity="Produit\ServiceBundle\Entity\Detailinfoentreprise", mappedBy="infoentreprise")
         */
    private $detailinfoentreprises;
	
	// variable du service de normalisation des noms des pays.
	private $servicetext;
	
	public function __construct(GeneralServicetext $service)
	{
	$this->servicetext = $service;
	$this->date = new \Datetime();
	$this->timestamp = time();
	$this->rang = 1;
	$this->valeur = false;
	$this->principal = false;
	$this->detailinfoentreprises = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	public function setServicetext(GeneralServicetext $service)
    {
    $this->servicetext = $service;
    }
    public function getServicetext()
    {
    return $this->servicetext;
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
     * @return Infoentreprise
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
     * Set description
     *
     * @param string $description
     * @return Infoentreprise
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
     * Set date
     *
     * @param \DateTime $date
     * @return Infoentreprise
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
     * Set timestamp
     *
     * @param integer $timestamp
     * @return Infoentreprise
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return integer 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set rang
     *
     * @param integer $rang
     * @return Infoentreprise
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

    /**
     * Set user
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Infoentreprise
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
     * Set imginfoentreprise
     *
     * @param \Produit\ServiceBundle\Entity\Imginfoentreprise $imginfoentreprise
     * @return Infoentreprise
     */
    public function setImginfoentreprise(\Produit\ServiceBundle\Entity\Imginfoentreprise $imginfoentreprise = null)
    {
        $this->imginfoentreprise = $imginfoentreprise;

        return $this;
    }

    /**
     * Get imginfoentreprise
     *
     * @return \Produit\ServiceBundle\Entity\Imginfoentreprise 
     */
    public function getImginfoentreprise()
    {
        return $this->imginfoentreprise;
    }

    /**
     * Add detailinfoentreprises
     *
     * @param \Produit\ServiceBundle\Entity\Detailinfoentreprise $detailinfoentreprises
     * @return Infoentreprise
     */
    public function addDetailinfoentreprise(\Produit\ServiceBundle\Entity\Detailinfoentreprise $detailinfoentreprises)
    {
        $this->detailinfoentreprises[] = $detailinfoentreprises;

        return $this;
    }

    /**
     * Remove detailinfoentreprises
     *
     * @param \Produit\ServiceBundle\Entity\Detailinfoentreprise $detailinfoentreprises
     */
    public function removeDetailinfoentreprise(\Produit\ServiceBundle\Entity\Detailinfoentreprise $detailinfoentreprises)
    {
        $this->detailinfoentreprises->removeElement($detailinfoentreprises);
    }

    /**
     * Get detailinfoentreprises
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetailinfoentreprises()
    {
        return $this->detailinfoentreprises;
    }

    /**
     * Set principal
     *
     * @param boolean $principal
     * @return Infoentreprise
     */
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Get principal
     *
     * @return boolean 
     */
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Infoentreprise
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set valeur
     *
     * @param boolean $valeur
     * @return Infoentreprise
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return boolean 
     */
    public function getValeur()
    {
        return $this->valeur;
    }
}
