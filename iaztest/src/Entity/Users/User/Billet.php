<?php

namespace App\Entity\Users\User;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Repository\Users\User\BilletRepository;
use App\Entity\Users\User\User;
use App\Entity\Users\User\Reponsebillet;
use App\Entity\Produit\Produit\Produitpanier;
use App\Entity\Produit\Produit\Panier;
use Doctrine\Common\Collections\Collection;

/**
 * Billet
 *
 * @ORM\Table("billet")
 * @ORM\Entity(repositoryClass=BilletRepository::class)
 ** @ORM\HasLifecycleCallbacks
 */
class Billet
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
     * @ORM\Column(name="titre", type="string", length=255,nullable=true)
     *@Taillemax(valeur=200, message="Le nom publique doit avoir au plus 200 caractès")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     *@Taillemin(valeur=2, message="Le nom publique doit avoir au moins 2 caractères")
     *@Taillemax(valeur=1500, message="Le nom publique doit avoir au plus 1500 caractès")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="avis", type="boolean")
     */
    private $avis;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="avisuser", type="integer")
     */
    private $avisuser;
	
	/**
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=true)
    */
	private $user;
	
	/**
     * @ORM\OneToMany(targetEntity=Reponsebillet::class, mappedBy="billet")
     */
    private $reponsebillets;
	
	/**
     * @ORM\ManyToOne(targetEntity=Produitpanier::class, inversedBy="billets")
     * @ORM\JoinColumn(nullable=true)
    */
	private $produitpanier;
	
	/**
       * @ORM\ManyToOne(targetEntity=Panier::class, inversedBy="billets")
       * @ORM\JoinColumn(nullable=true)
     */
	private $panier;
    
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->avis = false;
		$this->avisuser = 0;
		$this->reponsebillets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     * @return Billet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Billet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Billet
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
     * @return Billet
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
     * Add reponsebillets
     * @return Billet
     */
    public function addReponsebillet(Reponsebillet $reponsebillets): self
    {
        $this->reponsebillets[] = $reponsebillets;

        return $this;
    }

    /**
     * Remove reponsebillets
     */
    public function removeReponsebillet(Reponsebillet $reponsebillets)
    {
        $this->reponsebillets->removeElement($reponsebillets);
    }

    /**
     * Get reponsebillets 
     */
    public function getReponsebillets(): ?Collection
    {
        return $this->reponsebillets;
    }

    /**
     * Set avis
     *
     * @param boolean $avis
     * @return Billet
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return boolean 
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set avisuser
     *
     * @param integer $avisuser
     * @return Billet
     */
    public function setAvisuser($avisuser)
    {
        $this->avisuser = $avisuser;

        return $this;
    }

    /**
     * Get avisuser
     *
     * @return integer 
     */
    public function getAvisuser()
    {
        return $this->avisuser;
    }
	
	/**
	* @ORM\PrePersist()
	*/
	public function preUpdateProduit()
	{
		if($this->avis == true){
			foreach($this->panier->getProduitpaniers() as $propan)
			{
				$produit = $propan->getProduit();

				$produit->setNbvote($produit->getNbvote() + 1);
				$produit->setTotalnote($produit->getTotalnote() + $this->avisuser);
			}
			
		}
	}

    /**
     * Set produitpanier
     * @return Billet
     */
    public function setProduitpanier(Produitpanier $produitpanier = null): self
    {
        $this->produitpanier = $produitpanier;
		if($produitpanier != null)
		{
			$produitpanier->addBillet($this);
		}
        return $this;
    }

    /**
     * Get produitpanier
     */
    public function getProduitpanier(): ?Produitpanier
    {
        return $this->produitpanier;
    }

    /**
     * Set panier
     * @return Billet
     */
    public function setPanier(Panier $panier = null): self
    {
        $this->panier = $panier;
		if($panier != null)
		{
			$panier->addBillet($this);
		}

        return $this;
    }

    /**
     * Get panier
     */
    public function getPanier(): ?Panier
    {
        return $this->panier;
    }
}
