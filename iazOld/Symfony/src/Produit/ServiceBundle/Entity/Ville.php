<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use General\ServiceBundle\Servicetext\GeneralServicetext;

/**
 * Ville
 *
 * @ORM\Table("ville")
 * @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\VilleRepository")
 */
class Ville
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
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=false)
        */
	private $user;
	
	/**
         * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Coutlivraison", mappedBy="ville")
         */
    private $coutlivraisons;
	
	// variable du service de normalisation des noms des pays.
	private $servicetext;
	
	public function __construct(GeneralServicetext $service)
	{
	$this->servicetext = $service;
	$this->date = new \Datetime();
	$this->coutlivraisons = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	public function setServicetext( GeneralServicetext $service)
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
     * @return Ville
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
     * Set pays
     *
     * @param string $pays
     * @return Ville
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Ville
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
     * @return Ville
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
     * Add coutlivraisons
     *
     * @param \Produit\ProduitBundle\Entity\Coutlivraison $coutlivraisons
     * @return Ville
     */
    public function addCoutlivraison(\Produit\ProduitBundle\Entity\Coutlivraison $coutlivraisons)
    {
        $this->coutlivraisons[] = $coutlivraisons;

        return $this;
    }

    /**
     * Remove coutlivraisons
     *
     * @param \Produit\ProduitBundle\Entity\Coutlivraison $coutlivraisons
     */
    public function removeCoutlivraison(\Produit\ProduitBundle\Entity\Coutlivraison $coutlivraisons)
    {
        $this->coutlivraisons->removeElement($coutlivraisons);
    }

    /**
     * Get coutlivraisons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCoutlivraisons()
    {
        return $this->coutlivraisons;
    }
}
