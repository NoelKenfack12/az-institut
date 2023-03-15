<?php

namespace App\Entity\Produit\Produit;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\Produit\Produit\ProduitRepository;
use App\Entity\Users\User\User;
use App\Entity\Produit\Produit\Imgproduit;
use App\Entity\Produit\Produit\Coutlivraison;
use App\Entity\Produit\Produit\Caracteristiqueproduit;
use App\Entity\Produit\Produit\Souscategorie;
use Doctrine\Common\Collections\Collection;

/**
 * Produit
 *
 * @ORM\Table("produit")
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
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
     * @Taillemin(valeur=3, message="Au moins 3 caractères")
     * @Taillemax(valeur=200, message="Au plus 200 caractès")
     */
    private $nom;
	
	/**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text",nullable=true)
     * @Taillemax(valeur=500, message="Au plus 500 caractès")
     */
    private $contenu;
	
	/**
     * @var string
     *
     * @ORM\Column(name="rapport", type="string",nullable=true)
     * @Taillemax(valeur=50, message="Au plus 50 caractès")
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
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=false)
     */
	private $user;
	
	/**
       * @ORM\ManyToMany(targetEntity=User::class)
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
       * @ORM\OneToOne(targetEntity=Imgproduit::class, cascade={"persist", "remove"})
      * @Assert\Valid()
       */
	private $imgproduit;
	
	/**
         * @ORM\OneToMany(targetEntity=Coutlivraison::class, mappedBy="produit")
         */
    private $coutlivraisons;
	
	/**
     * @ORM\OneToMany(targetEntity=Caracteristiqueproduit::class, mappedBy="produit")
     */
    private $caracteristiqueproduits;
	
	 /**
       * @ORM\ManyToOne(targetEntity=Souscategorie::class, inversedBy="produits")
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
		$coutlivraison = $this->em->getRepository(Coutlivraison::class)
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
     * @return Produit
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
     * Set souscategorie
     * @return Produit
     */
    public function setSouscategorie(Souscategorie $souscategorie): self
    {
        $this->souscategorie = $souscategorie;
		$souscategorie->addProduit($this);

        return $this;
    }

    /**
     * Get souscategorie 
     */
    public function getSouscategorie(): ?Souscategorie
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
     * @return Produit
     */
    public function addUserlike(User $userlikes): self
    {
        $this->userlikes[] = $userlikes;
		$this->nblike = $this->nblike + 1;

        return $this;
    }

    /**
     * Remove userlikes
     */
    public function removeUserlike(User $userlikes)
    {
        $this->userlikes->removeElement($userlikes);
    }

    /**
     * Get userlikes 
     */
    public function getUserlikes(): ?Collection
    {
        return $this->userlikes;
    }
    
    /**
     * Add coutlivraisons
     * @return Produit
     */
    public function addCoutlivraison(Coutlivraison $coutlivraisons): self
    {
        $this->coutlivraisons[] = $coutlivraisons;

        return $this;
    }

    /**
     * Remove coutlivraisons
     */
    public function removeCoutlivraison(Coutlivraison $coutlivraisons)
    {
        $this->coutlivraisons->removeElement($coutlivraisons);
    }

    /**
     * Get coutlivraisons 
     */
    public function getCoutlivraisons(): ?Collection
    {
        return $this->coutlivraisons;
    }

    /**
     * Add caracteristiqueproduits
     * @return Produit
     */
    public function addCaracteristiqueproduit(Caracteristiqueproduit $caracteristiqueproduits): self
    {
        $this->caracteristiqueproduits[] = $caracteristiqueproduits;

        return $this;
    }

    /**
     * Remove caracteristiqueproduits
     */
    public function removeCaracteristiqueproduit(Caracteristiqueproduit $caracteristiqueproduits)
    {
        $this->caracteristiqueproduits->removeElement($caracteristiqueproduits);
    }

    /**
     * Get caracteristiqueproduits
     */
    public function getCaracteristiqueproduits(): ?Collection
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
     * @return Produit
     */
    public function setImgproduit(Imgproduit $imgproduit = null): self
    {
        $this->imgproduit = $imgproduit;

        return $this;
    }

    /**
     * Get imgproduit
     */
    public function getImgproduit(): ?Imgproduit
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
