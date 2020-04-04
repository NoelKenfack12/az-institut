<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ServiceBundle\Servicetext\GeneralServicetext;

/**
 * Coutlivraison
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\CoutlivraisonRepository")
 */
class Coutlivraison
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
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

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
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Ville", inversedBy="coutlivraisons")
       * @ORM\JoinColumn(nullable=false)
        */
	private $ville;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Produit", inversedBy="coutlivraisons")
       * @ORM\JoinColumn(nullable=false)
        */
	private $produit;
	
	// variable du service de normalisation des noms des pays.
	private $servicetext;
	
	public function __construct(GeneralServicetext $service)
	{
	$this->servicetext = $service;
	$this->date = new \Datetime();
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
     * Set montant
     *
     * @param integer $montant
     * @return Coutlivraison
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
     * @return Coutlivraison
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
     * @return Coutlivraison
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
     * Set ville
     *
     * @param \Produit\ServiceBundle\Entity\Ville $ville
     * @return Coutlivraison
     */
    public function setVille(\Produit\ServiceBundle\Entity\Ville $ville)
    {
        $this->ville = $ville;
		$ville->addCoutlivraison($this);

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

    /**
     * Set produit
     *
     * @param \Produit\ProduitBundle\Entity\Produit $produit
     * @return Coutlivraison
     */
    public function setProduit(\Produit\ProduitBundle\Entity\Produit $produit)
    {
        $this->produit = $produit;
		$produit->addCoutlivraison($this);

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Produit\ProduitBundle\Entity\Produit 
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
