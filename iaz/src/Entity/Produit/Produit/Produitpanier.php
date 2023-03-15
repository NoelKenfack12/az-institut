<?php

namespace App\Entity\Produit\Produit;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\Produit\Produit\ProduitpanierRepository;
use App\Entity\Produit\Produit\Produit;
use App\Entity\Produit\Produit\Panier;
use App\Entity\Users\User\Billet;
use Doctrine\Common\Collections\Collection;

/**
 * Produitpanier
 *
 * @ORM\Table("produitpanier")
 * @ORM\Entity(repositoryClass=ProduitpanierRepository::class)
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
       * @ORM\ManyToOne(targetEntity=Produit::class)
       * @ORM\JoinColumn(nullable=false)
       */
	private $produit;
	
	/**
       * @ORM\ManyToOne(targetEntity=Panier::class, inversedBy="produitpaniers")
       * @ORM\JoinColumn(nullable=false)
    */
	private $panier;
	
	/**
     * @ORM\OneToMany(targetEntity=Billet::class, mappedBy="produitpanier")
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
     * @return Produitpanier
     */
    public function setProduit(Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     */
    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    /**
     * Set panier
     *
     * @return Produitpanier
     */
    public function setPanier(Panier $panier): self
    {
        $this->panier = $panier;
		$panier->addProduitpanier($this);

        return $this;
    }

    /**
     * Get panier
     */
    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    /**
     * Add billets
     * @return Produitpanier
     */
    public function addBillet(Billet $billets): self
    {
        $this->billets[] = $billets;

        return $this;
    }

    /**
     * Remove billets
     *
     */
    public function removeBillet(Billet $billets)
    {
        $this->billets->removeElement($billets);
    }

    /**
     * Get billets 
     */
    public function getBillets(): ?Collection
    {
        return $this->billets;
    }
}
