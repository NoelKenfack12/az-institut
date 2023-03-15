<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use General\ServiceBundle\Servicetext\GeneralServicetext;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Produit
 *
 * @ORM\Table("produit")
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\ProduitRepository")
 ** @ORM\HasLifecycleCallbacks
 */
class Produit
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
     *@Taillemax(valeur=200, message="Au plus 200 caractès")
     */
    private $nom;
	
	/**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text",nullable=true)
     *@Taillemax(valeur=500, message="Au plus 500 caractès")
     */
    private $contenu;
	
	/**
     * @var string
     *
     * @ORM\Column(name="rapport", type="string",nullable=true)
     *@Taillemax(valeur=50, message="Au plus 50 caractès")
     */
    private $rapport;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="choixauteur", type="boolean")
     */
    private $choixauteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="nblike", type="integer")
     */
    private $nblike;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbvente", type="integer")
     */
    private $nbvente;

    /**
     * @var integer
     *
     * @ORM\Column(name="newprise", type="integer")
     */
    private $newprise;

    /**
     * @var integer
     *
     * @ORM\Column(name="lastprise", type="integer")
     */
    private $lastprise;

    /**
     * @var integer
     *
     * @ORM\Column(name="difference", type="integer")
     */
    private $difference;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=false)
     */
	private $user;
	
	/**
       * @ORM\ManyToMany(targetEntity="Users\UserBundle\Entity\User")
	   * @ORM\JoinColumn(nullable=true)
     */
    private $userlikes;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="prixlivraison", type="integer")
     */
    private $prixlivraison;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="nbvote", type="integer")
     */
    private $nbvote;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="totalnote", type="integer")
     */
    private $totalnote;
	
	/**
       * @ORM\OneToOne(targetEntity="Produit\ProduitBundle\Entity\Imgproduit", cascade={"persist", "remove"})
      * @Assert\Valid()
       */
	private $imgproduit;
	
	/**
         * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Coutlivraison", mappedBy="produit")
         */
    private $coutlivraisons;
	
	/**
     * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Caracteristiqueproduit", mappedBy="produit")
     */
    private $caracteristiqueproduits;
	
	 /**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Souscategorie", inversedBy="produits")
       * @ORM\JoinColumn(nullable=false)
        */
	private $souscategorie;
	
	private $servicetext;
	
	private $em;
	
	public function __construct(GeneralServicetext $service)
	{
		$this->servicetext = $service;
		$this->nblike = 0;
		$this->nbvente = 0;
		$this->difference = 0;
		$this->rang = 0;
		$this->nbvote = 1;
		$this->totalnote = 4;
		$this->date = new \Datetime();
		$this->coutlivraisons = new \Doctrine\Common\Collections\ArrayCollection();
		$this->userlikes = new \Doctrine\Common\Collections\ArrayCollection();
		$this->caracteristiqueproduits = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	public function setEm($em)
	{
	$this->em = $em;
	}
	public function getEm()
	{
	return $this->em;
	}
	
	public function priseLivraison($ville)
	{
		$coutlivraison = $this->em->getRepository('ProduitProduitBundle:Coutlivraison')
	                     ->findOneBy(array('ville'=>$ville,'produit'=>$this));
		if($coutlivraison != null)
		{
			return $coutlivraison->getMontant();
		}else{
			return $this->prixlivraison;
		}
	}
	
	public function getServicetext()
	{
		return $this->servicetext;
	}
	
	public function setServicetext(GeneralServicetext $service)
	{
		$this->servicetext = $service;
		return $this;
	}
	
	public function ancienPrixProduit()
	{
	$aprix = $this->newprise + $this->difference;
	return $aprix;
	}
	
	/**
      * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preSave()
    {
	if($this->newprise != $this->lastprise)
	{
        $this->difference = ($this->lastprise - $this->newprise);
	}
	$this->lastprise = $this->newprise;
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
     * @return Produit
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
     * @return Produit
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
     * Set nblike
     *
     * @param integer $nblike
     * @return Produit
     */
    public function setNblike($nblike)
    {
        $this->nblike = $nblike;

        return $this;
    }

    /**
     * Get nblike
     *
     * @return integer 
     */
    public function getNblike()
    {
        return $this->nblike;
    }

    /**
     * Set nbvente
     *
     * @param integer $nbvente
     * @return Produit
     */
    public function setNbvente($nbvente)
    {
        $this->nbvente = $nbvente;

        return $this;
    }

    /**
     * Get nbvente
     *
     * @return integer 
     */
    public function getNbvente()
    {
        return $this->nbvente;
    }

    /**
     * Set newprise
     *
     * @param integer $newprise
     * @return Produit
     */
    public function setNewprise($newprise)
    {
        $this->newprise = $newprise;

        return $this;
    }

    /**
     * Get newprise
     *
     * @return integer 
     */
    public function getNewprise()
    {
        return $this->newprise;
    }

    /**
     * Set lastprise
     *
     * @param integer $lastprise
     * @return Produit
     */
    public function setLastprise($lastprise)
    {
        $this->lastprise = $lastprise;

        return $this;
    }

    /**
     * Get lastprise
     *
     * @return integer 
     */
    public function getLastprise()
    {
        return $this->lastprise;
    }

    /**
     * Set difference
     *
     * @param integer $difference
     * @return Produit
     */
    public function setDifference($difference)
    {
        $this->difference = $difference;

        return $this;
    }

    /**
     * Get difference
     *
     * @return integer 
     */
    public function getDifference()
    {
        return $this->difference;
    }

    /**
     * Set user
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Produit
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
     * Set souscategorie
     *
     * @param \Produit\ProduitBundle\Entity\Souscategorie $souscategorie
     * @return Produit
     */
    public function setSouscategorie(\Produit\ProduitBundle\Entity\Souscategorie $souscategorie)
    {
        $this->souscategorie = $souscategorie;
		$souscategorie->addProduit($this);

        return $this;
    }

    /**
     * Get souscategorie
     *
     * @return \Produit\ProduitBundle\Entity\Souscategorie 
     */
    public function getSouscategorie()
    {
        return $this->souscategorie;
    }

    /**
     * Set prixlivraison
     *
     * @param integer $prixlivraison
     * @return Produit
     */
    public function setPrixlivraison($prixlivraison)
    {
        $this->prixlivraison = $prixlivraison;

        return $this;
    }

    /**
     * Get prixlivraison
     *
     * @return integer 
     */
    public function getPrixlivraison()
    {
        return $this->prixlivraison;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Produit
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Add userlikes
     *
     * @param \Users\UserBundle\Entity\User $userlikes
     * @return Produit
     */
    public function addUserlike(\Users\UserBundle\Entity\User $userlikes)
    {
        $this->userlikes[] = $userlikes;
		$this->nblike = $this->nblike + 1;

        return $this;
    }

    /**
     * Remove userlikes
     *
     * @param \Users\UserBundle\Entity\User $userlikes
     */
    public function removeUserlike(\Users\UserBundle\Entity\User $userlikes)
    {
        $this->userlikes->removeElement($userlikes);
    }

    /**
     * Get userlikes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserlikes()
    {
        return $this->userlikes;
    }

    /**
     * Add coutlivraisons
     *
     * @param \Produit\ProduitBundle\Entity\Coutlivraison $coutlivraisons
     * @return Produit
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

    /**
     * Add caracteristiqueproduits
     *
     * @param \Produit\ProduitBundle\Entity\Caracteristiqueproduit $caracteristiqueproduits
     * @return Produit
     */
    public function addCaracteristiqueproduit(\Produit\ProduitBundle\Entity\Caracteristiqueproduit $caracteristiqueproduits)
    {
        $this->caracteristiqueproduits[] = $caracteristiqueproduits;

        return $this;
    }

    /**
     * Remove caracteristiqueproduits
     *
     * @param \Produit\ProduitBundle\Entity\Caracteristiqueproduit $caracteristiqueproduits
     */
    public function removeCaracteristiqueproduit(\Produit\ProduitBundle\Entity\Caracteristiqueproduit $caracteristiqueproduits)
    {
        $this->caracteristiqueproduits->removeElement($caracteristiqueproduits);
    }

    /**
     * Get caracteristiqueproduits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCaracteristiqueproduits()
    {
        return $this->caracteristiqueproduits;
    }

    /**
     * Set rapport
     *
     * @param string $rapport
     * @return Produit
     */
    public function setRapport($rapport)
    {
        $this->rapport = $rapport;

        return $this;
    }

    /**
     * Get rapport
     *
     * @return string 
     */
    public function getRapport()
    {
        return $this->rapport;
    }

    /**
     * Set rang
     *
     * @param integer $rang
     * @return Produit
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return integer 
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set imgproduit
     *
     * @param \Produit\ProduitBundle\Entity\Imgproduit $imgproduit
     * @return Produit
     */
    public function setImgproduit(\Produit\ProduitBundle\Entity\Imgproduit $imgproduit = null)
    {
        $this->imgproduit = $imgproduit;

        return $this;
    }

    /**
     * Get imgproduit
     *
     * @return \Produit\ProduitBundle\Entity\Imgproduit 
     */
    public function getImgproduit()
    {
        return $this->imgproduit;
    }

    /**
     * Set choixauteur
     *
     * @param boolean $choixauteur
     * @return Produit
     */
    public function setChoixauteur($choixauteur)
    {
        $this->choixauteur = $choixauteur;

        return $this;
    }

    /**
     * Get choixauteur
     *
     * @return boolean 
     */
    public function getChoixauteur()
    {
        return $this->choixauteur;
    }

    /**
     * Set nbvote
     *
     * @param integer $nbvote
     * @return Produit
     */
    public function setNbvote($nbvote)
    {
        $this->nbvote = $nbvote;

        return $this;
    }

    /**
     * Get nbvote
     *
     * @return integer 
     */
    public function getNbvote()
    {
        return $this->nbvote;
    }

    /**
     * Set totalnote
     *
     * @param integer $totalnote
     * @return Produit
     */
    public function setTotalnote($totalnote)
    {
        $this->totalnote = $totalnote;

        return $this;
    }

    /**
     * Get totalnote
     *
     * @return integer 
     */
    public function getTotalnote()
    {
        return $this->totalnote;
    }
}
