<?php

namespace App\Entity\Produit\Service;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Repository\Produit\Service\InfoentrepriseRepository;
use App\Entity\Users\User\User;
use App\Entity\Produit\Service\Imginfoentreprise;
use App\Entity\Produit\Service\Detailinfoentreprise;
use Doctrine\Common\Collections\Collection;

/**
 * Infoentreprise
 *
 * @ORM\Table("infoentreprise")
 * @ORM\Entity(repositoryClass=InfoentrepriseRepository::class)
  * @UniqueEntity(fields="rang", message="Cette position est déjà reservée.")
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
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer",unique=true)
     */
    private $rang;
	
	/**
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=false)
    */
	private $user;
	
	/**
     * @ORM\OneToOne(targetEntity=Imginfoentreprise::class,  cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid()
    */
	private $imginfoentreprise;
	
	/**
     * @ORM\OneToMany(targetEntity=Detailinfoentreprise::class, mappedBy="infoentreprise")
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
     * @return Infoentreprise
     */
    public function setUser(User $user): self
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
     * Set imginfoentreprise
     * @return Infoentreprise
     */
    public function setImginfoentreprise(Imginfoentreprise $imginfoentreprise = null): self
    {
        $this->imginfoentreprise = $imginfoentreprise;

        return $this;
    }

    /**
     * Get imginfoentreprise
     */
    public function getImginfoentreprise(): ?Imginfoentreprise
    {
        return $this->imginfoentreprise;
    }

    /**
     * Add detailinfoentreprises
     * @return Infoentreprise
     */
    public function addDetailinfoentreprise(Detailinfoentreprise $detailinfoentreprises): self
    {
        $this->detailinfoentreprises[] = $detailinfoentreprises;

        return $this;
    }

    /**
     * Remove detailinfoentreprises
     */
    public function removeDetailinfoentreprise(Detailinfoentreprise $detailinfoentreprises)
    {
        $this->detailinfoentreprises->removeElement($detailinfoentreprises);
    }

    /**
     * Get detailinfoentreprises 
     */
    public function getDetailinfoentreprises(): ?Collection
    {
        return $this->detailinfoentreprises;
    }
}
