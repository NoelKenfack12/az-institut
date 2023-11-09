<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToArrayTransformer;

/**
 * Panier
 *
 * @ORM\Table("panier")
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\PanierRepository")
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
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=true)
        */
	private $user;
	
	/**
       * @ORM\OneToOne(targetEntity="Produit\ServiceBundle\Entity\Ville")
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
         * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Produitpanier", mappedBy="panier")
         */
    private $produitpaniers;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Couponcard", inversedBy="paniers")
       * @ORM\JoinColumn(nullable=true)
        */
	private $couponcard;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\Contacts", inversedBy="paniers")
       * @ORM\JoinColumn(nullable=true)
        */
	private $contact;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Service")
       * @ORM\JoinColumn(nullable=true)
        */
	private $service;
	
	/**
         * @ORM\OneToMany(targetEntity="Users\UserBundle\Entity\Billet", mappedBy="panier")
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
     *
     * @param \Produit\ProduitBundle\Entity\Produitpanier $produitpaniers
     * @return Panier
     */
    public function addProduitpanier(\Produit\ProduitBundle\Entity\Produitpanier $produitpaniers)
    {
        $this->produitpaniers[] = $produitpaniers;

        return $this;
    }

    /**
     * Remove produitpaniers
     *
     * @param \Produit\ProduitBundle\Entity\Produitpanier $produitpaniers
     */
    public function removeProduitpanier(\Produit\ProduitBundle\Entity\Produitpanier $produitpaniers)
    {
        $this->produitpaniers->removeElement($produitpaniers);
    }

    /**
     * Get produitpaniers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduitpaniers()
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
     *
     * @param \Produit\ServiceBundle\Entity\Ville $ville
     * @return Panier
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
     *
     * @param \Produit\ServiceBundle\Entity\Couponcard $couponcard
     * @return Panier
     */
    public function setCouponcard(\Produit\ServiceBundle\Entity\Couponcard $couponcard = null)
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
     *
     * @return \Produit\ServiceBundle\Entity\Couponcard 
     */
    public function getCouponcard()
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
     *
     * @param \Users\UserBundle\Entity\Contacts $contact
     * @return Panier
     */
    public function setContact(\Users\UserBundle\Entity\Contacts $contact = null)
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
     *
     * @return \Users\UserBundle\Entity\Contacts 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set service
     *
     * @param \Produit\ServiceBundle\Entity\Service $service
     * @return Panier
     */
    public function setService(\Produit\ServiceBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Produit\ServiceBundle\Entity\Service 
     */
    public function getService()
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
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Panier
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
     * Add billets
     *
     * @param \Users\UserBundle\Entity\Billet $billets
     * @return Panier
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