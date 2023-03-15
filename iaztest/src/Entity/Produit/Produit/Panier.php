<?php

namespace App\Entity\Produit\Produit;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToArrayTransformer;
use App\Repository\Produit\Produit\PanierRepository;
use App\Entity\Users\User\User;
use App\Entity\Produit\Service\Ville;
use App\Entity\Produit\Produit\Produitpanier;
use App\Entity\Produit\Service\Couponcard;
use App\Entity\Users\User\Contacts;
use App\Entity\Produit\Service\Service;
use App\Entity\Users\User\Billet;
use Doctrine\Common\Collections\Collection;

/**
 * Panier
 *
 * @ORM\Table("panier")
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 */
class Panier
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="payer", type="boolean")
     */
    private $payer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="livrer", type="boolean")
     */
    private $livrer;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="sousmis", type="boolean")
     */
    private $sousmis;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="coastlivraison", type="integer")
     */
	private $coastlivraison;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="montantht", type="integer")
     */
	private $montantht;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="montantttc", type="integer")
     */
	private $montantttc;
	
	/**
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=true)
        */
	private $user;
	
	/**
       * @ORM\OneToOne(targetEntity=Ville::class)
       * @ORM\JoinColumn(nullable=true)
    */
	private $ville;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="livraisonpayer", type="boolean")
     */
    private $livraisonpayer;
	
	/**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;
	
	/**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=255, nullable=true)
     */
    private $destination;
	
	/**
     * @ORM\OneToMany(targetEntity=Produitpanier::class, mappedBy="panier")
     */
    private $produitpaniers;
	
	/**
       * @ORM\ManyToOne(targetEntity=Couponcard::class, inversedBy="paniers")
       * @ORM\JoinColumn(nullable=true)
    */
	private $couponcard;
	
	/**
       * @ORM\ManyToOne(targetEntity=Contacts::class, inversedBy="paniers")
       * @ORM\JoinColumn(nullable=true)
    */
	private $contact;
	
	/**
       * @ORM\ManyToOne(targetEntity=Service::class)
       * @ORM\JoinColumn(nullable=true)
    */
	private $service;
	
	/**
     * @ORM\OneToMany(targetEntity=Billet::class, mappedBy="panier")
     */
    private $billets;
	
	public function __construct()
	{
		$this->produitpaniers = new \Doctrine\Common\Collections\ArrayCollection();
		$this->date = new \Datetime();
		$this->payer = false;
		$this->livrer = false;
		$this->livraisonpayer = false;
		$this->coastlivraison = 0;
		$this->sousmis = false;
		$this->montantht = 0;
		$this->montantttc = 0;
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
     * Set date
     *
     * @param \DateTime $date
     * @return Panier
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
     * Set payer
     *
     * @param boolean $payer
     * @return Panier
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * Get payer
     *
     * @return boolean 
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Set livrer
     *
     * @param boolean $livrer
     * @return Panier
     */
    public function setLivrer($livrer)
    {
        $this->livrer = $livrer;

        return $this;
    }

    /**
     * Get livrer
     *
     * @return boolean 
     */
    public function getLivrer()
    {
        return $this->livrer;
    }

    /**
     * Add produitpaniers
     * @return Panier
     */
    public function addProduitpanier(Produitpanier $produitpaniers): self
    {
        $this->produitpaniers[] = $produitpaniers;

        return $this;
    }

    /**
     * Remove produitpaniers
     */
    public function removeProduitpanier(Produitpanier $produitpaniers)
    {
        $this->produitpaniers->removeElement($produitpaniers);
    }

    /**
     * Get produitpaniers 
     */
    public function getProduitpaniers(): ?Collection
    {
        return $this->produitpaniers;
    }

    /**
     * Set livraisonpayer
     *
     * @param boolean $livraisonpayer
     * @return Panier
     */
    public function setLivraisonpayer($livraisonpayer)
    {
        $this->livraisonpayer = $livraisonpayer;

        return $this;
    }

    /**
     * Get livraisonpayer
     *
     * @return boolean 
     */
    public function getLivraisonpayer()
    {
        return $this->livraisonpayer;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Panier
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return Panier
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set coastlivraison
     *
     * @param integer $coastlivraison
     * @return Panier
     */
    public function setCoastlivraison($coastlivraison)
    {
        $this->coastlivraison = $coastlivraison;

        return $this;
    }

    /**
     * Get coastlivraison
     *
     * @return integer 
     */
    public function getCoastlivraison()
    {
        return $this->coastlivraison;
    }

    /**
     * Set ville
     * @return Panier
     */
    public function setVille(Ville $ville = null): self
    {
        $this->ville = $ville;

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
     * Set sousmis
     *
     * @param boolean $sousmis
     * @return Panier
     */
    public function setSousmis($sousmis)
    {
        $this->sousmis = $sousmis;

        return $this;
    }

    /**
     * Get sousmis
     *
     * @return boolean 
     */
    public function getSousmis()
    {
        return $this->sousmis;
    }
	
	/**
     * Set couponcard
     * @return Panier
     */
    public function setCouponcard(Couponcard $couponcard = null): self
    {
        $this->couponcard = $couponcard;
		if($couponcard != null)
		{
			$couponcard->addPanier($this);
		}

        return $this;
    }

    /**
     * Get couponcard 
     */
    public function getCouponcard(): ?Couponcard
    {
        return $this->couponcard;
    }

    /**
     * Set montantht
     *
     * @param integer $montantht
     * @return Panier
     */
    public function setMontantht($montantht)
    {
        $this->montantht = $montantht;

        return $this;
    }

    /**
     * Get montantht
     *
     * @return integer 
     */
    public function getMontantht()
    {
        return $this->montantht;
    }

    /**
     * Set montantttc
     *
     * @param integer $montantttc
     * @return Panier
     */
    public function setMontantttc($montantttc)
    {
        $this->montantttc = $montantttc;

        return $this;
    }

    /**
     * Get montantttc
     *
     * @return integer 
     */
    public function getMontantttc()
    {
        return $this->montantttc;
    }

    /**
     * Set contact
     * @return Panier
     */
    public function setContact(Contacts $contact = null): self
    {
        $this->contact = $contact;
		if($contact != null)
		{
			$contact->addPanier($this);
		}

        return $this;
    }

    /**
     * Get contact
     */
    public function getContact(): ?Contacts
    {
        return $this->contact;
    }

    /**
     * Set service
     * @return Panier
     */
    public function setService(Service $service = null): self
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     */
    public function getService(): ?Service
    {
        return $this->service;
    }
	
	public function numFacture()
	{
		$datetransform = new DateTimeToArrayTransformer();
		$dt = $datetransform->transform($this->getDate());
		return 'AH'.$dt['day'].''.$this->getId().''.$dt['month'].''.$dt['year'];
	}
	
	public function dateFacture()
	{
		$datetransform = new DateTimeToArrayTransformer();
		$dt = $datetransform->transform($this->getDate());
		return $dt['day'].'/'.$dt['month'].'/'.$dt['year'];
	}

    /**
     * Set user
     * @return Panier
     */
    public function setUser(User $user = null): self
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
     * Add billets
     * @return Panier
     */
    public function addBillet(Billet $billets): self
    {
        $this->billets[] = $billets;

        return $this;
    }

    /**
     * Remove billets
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
