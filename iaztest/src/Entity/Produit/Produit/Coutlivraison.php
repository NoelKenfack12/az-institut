<?php

namespace App\Entity\Produit\Produit;

use Doctrine\ORM\Mapping as ORM;
use App\Service\Servicetext\GeneralServicetext;
use App\Repository\Produit\Produit\CoutlivraisonRepository;
use App\Entity\Users\User\User;
use App\Entity\Produit\Service\Ville;
use App\Entity\Produit\Produit\Produit;

/**
 * Coutlivraison
 *
 * @ORM\Table("coutlivraison")
 * @ORM\Entity(repositoryClass=CoutlivraisonRepository::class)
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
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=false)
    */
	private $user;
	
	/**
       * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="coutlivraisons")
       * @ORM\JoinColumn(nullable=false)
    */
	private $ville;
	
	/**
       * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="coutlivraisons")
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
     * @return Coutlivraison
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
     * Set ville
     * @return Coutlivraison
     */
    public function setVille(Ville $ville): self
    {
        $this->ville = $ville;
		$ville->addCoutlivraison($this);

        return $this;
    }

    /**
     * Get ville
     */
    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    /**
     * Set produit
     * @return Coutlivraison
     */
    public function setProduit(Produit $produit): self
    {
        $this->produit = $produit;
		$produit->addCoutlivraison($this);

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
