<?php

namespace Produit\ProduitBundle\Entity;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristiqueproduit
 *
 * @ORM\Table("caracteristiqueproduit")
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\CaracteristiqueproduitRepository")
 */
class Caracteristiqueproduit
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
     * @ORM\Column(name="valeur", type="text")
     *@Taillemax(valeur=2500, message="Au plus 2500 caractès")
     */
    private $valeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
	 * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Produit", inversedBy="caracteristiqueproduits")
	 * @ORM\JoinColumn(nullable=true)
	*/
    private $produit;

    /**
	 * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Caracteristique", inversedBy="caracteristiqueproduits")
	 * @ORM\JoinColumn(nullable=true)
	*/
    private $caracteristique;

    /**
      * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
      * @ORM\JoinColumn(nullable=false)
      */
      private $user;
    
    public function __construct()
	{
		$this->date = new \Datetime();
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
     * Set valeur
     *
     * @param string $valeur
     * @return Caracteristiqueplan
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Caracteristiqueplan
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
     * Set caracteristique
     *
     * @param \Produit\ServiceBundle\Entity\Caracteristique $caracteristique
     * @return Caracteristiqueplan
     */
    public function setCaracteristique(\Produit\ProduitBundle\Entity\Caracteristique $caracteristique = null)
    {
        $this->caracteristique = $caracteristique;
        if($caracteristique != null)
        {
            $caracteristique->addCaracteristiqueproduit($this);
        }
        
        return $this;
    }

    /**
     * Get caracteristique
     *
     * @return \Produit\ProduitBundle\Entity\Caracteristique 
     */
    public function getCaracteristique()
    {
        return $this->caracteristique;
    }

    /**
     * Set user
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Caracteristiqueplan
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
     * Set produit
     *
     * @param \Produit\ProduitBundle\Entity\Produit $produit
     * @return Caracteristiqueproduit
     */
    public function setProduit(\Produit\ProduitBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;
		if($produit != null)
		{
			$produit->addCaracteristiqueproduit($this);
		}

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
