<?php

namespace App\Entity\Produit\Produit;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Repository\Produit\Produit\CaracteristiqueproduitRepository;
use App\Entity\Produit\Produit\Produit;
use App\Entity\Produit\Produit\Caracteristique;
use App\Entity\Users\User\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristiqueproduit
 *
 * @ORM\Table("caracteristiqueproduit")
 * @ORM\Entity(repositoryClass=CaracteristiqueproduitRepository::class)
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
	 * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="caracteristiqueproduits")
	 * @ORM\JoinColumn(nullable=true)
	*/
    private $produit;

    /**
	 * @ORM\ManyToOne(targetEntity=Caracteristique::class, inversedBy="caracteristiqueproduits")
	 * @ORM\JoinColumn(nullable=true)
	*/
    private $caracteristique;

    /**
      * @ORM\ManyToOne(targetEntity=User::class)
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
     * @return Caracteristiqueplan
     */
    public function setCaracteristique(Caracteristique $caracteristique = null): self
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
     */
    public function getCaracteristique(): ?Caracteristique
    {
        return $this->caracteristique;
    }

    /**
     * Set user
     * @return Caracteristiqueplan
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
     * Set produit
     * @return Caracteristiqueproduit
     */
    public function setProduit(Produit $produit = null): self
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
     */
    public function getProduit(): ?Produit
    {
        return $this->produit;
    }
}
