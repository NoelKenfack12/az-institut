<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

/**
 * Detailinfoentreprise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\DetailinfoentrepriseRepository")
 */
class Detailinfoentreprise
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
     * @ORM\Column(name="description", type="text")
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
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Infoentreprise",inversedBy="detailinfoentreprises")
       * @ORM\JoinColumn(nullable=false)
        */
	private $infoentreprise;
	
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=false)
        */
	private $user;
	
	public function __construct()
	{
	$this->date = new \Datetime();
	$this->timestamp = time();
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
     * @return Detailinfoentreprise
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
     * @return Detailinfoentreprise
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
     * @return Detailinfoentreprise
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
     * @return Detailinfoentreprise
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
     * Set infoentreprise
     *
     * @param \Produit\ServiceBundle\Entity\Infoentreprise $infoentreprise
     * @return Detailinfoentreprise
     */
    public function setInfoentreprise(\Produit\ServiceBundle\Entity\Infoentreprise $infoentreprise)
    {
        $this->infoentreprise = $infoentreprise;
		$infoentreprise->addDetailinfoentreprise($this);

        return $this;
    }

    /**
     * Get infoentreprise
     *
     * @return \Produit\ServiceBundle\Entity\Infoentreprise 
     */
    public function getInfoentreprise()
    {
        return $this->infoentreprise;
    }

    /**
     * Set user
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Detailinfoentreprise
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
}
