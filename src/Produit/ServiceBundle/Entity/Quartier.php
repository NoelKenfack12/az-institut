<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use General\ServiceBundle\Servicetext\GeneralServicetext;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Quartier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\QuartierRepository")
 */
 
class Quartier
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
      *@Taillemin(valeur=3, message="Au moins 3 caractères")
     *@Taillemax(valeur=50, message="Au plus 50 caractès")
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=true)
        */
	private $user;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Ville")
       * @ORM\JoinColumn(nullable=true)
        */
	private $ville;
	
	// variable du service de normalisation des noms des pays.
	private $servicetext;
	
	public function __construct(GeneralServicetext $service)
	{
		$this->servicetext = $service;
		$this->date = new \Datetime();
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
     * Set nom
     *
     * @param string $nom
     * @return Quartier
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
     * @return Quartier
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
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Quartier
     */
    public function setUser(\Users\UserBundle\Entity\User $user = null)
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
     * Set ville
     *
     * @param \Produit\ServiceBundle\Entity\Ville $ville
     * @return Quartier
     */
    public function setVille(\Produit\ServiceBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \Produit\ServiceBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }
}
