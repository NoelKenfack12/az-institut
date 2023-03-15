<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produitpanier
 *
 * @ORM\Table("produitpanier")
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\ProduitpanierRepository")
 */
class Produitpanier
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
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Produit")
       * @ORM\JoinColumn(nullable=false)
       */
	private $produit;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Panier", inversedBy="produitpaniers")
       * @ORM\JoinColumn(nullable=false)
        */
	private $panier;
	
	/**
         * @ORM\OneToMany(targetEntity="Users\UserBundle\Entity\Billet", mappedBy="produitpanier")
         */
    private $billets;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->quantite = 1;
		$this->billets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set quantite
     *
     * @param integer $quantite
     * @return Produitpanier
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Produitpanier
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
     * Set produit
     *
     * @param \Produit\ProduitBundle\Entity\Produit $produit
     * @return Produitpanier
     */
    public function setProduit(\Produit\ProduitBundle\Entity\Produit $produit)
    {
        $this->produit = $produit;

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

    /**
     * Set panier
     *
     * @param \Produit\ProduitBundle\Entity\Panier $panier
     * @return Produitpanier
     */
    public function setPanier(\Produit\ProduitBundle\Entity\Panier $panier)
    {
        $this->panier = $panier;
		$panier->addProduitpanier($this);

        return $this;
    }

    /**
     * Get panier
     *
     * @return \Produit\ProduitBundle\Entity\Panier 
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * Add billets
     *
     * @param \Users\UserBundle\Entity\Billet $billets
     * @return Produitpanier
     */
    public function addBillet(\Users\UserBundle\Entity\Billet $billets)
    {
        $this->billets[] = $billets;

        return $this;
    }

    /**
     * Remove billets
     *
     * @param \Users\UserBundle\Entity\Billet $billets
     */
    public function removeBillet(\Users\UserBundle\Entity\Billet $billets)
    {
        $this->billets->removeElement($billets);
    }

    /**
     * Get billets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBillets()
    {
        return $this->billets;
    }
}
