<?php

namespace Users\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

/**
 * Billet
 *
* @ORM\Table("billet")
 * @ORM\Entity(repositoryClass="Users\UserBundle\Entity\BilletRepository")
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
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=true)
        */
	private $user;
	
	/**
         * @ORM\OneToMany(targetEntity="Users\UserBundle\Entity\Reponsebillet", mappedBy="billet")
         */
    private $reponsebillets;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Produitpanier", inversedBy="billets")
       * @ORM\JoinColumn(nullable=true)
        */
	private $produitpanier;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Panier", inversedBy="billets")
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
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Billet
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
     * Add reponsebillets
     *
     * @param \Users\UserBundle\Entity\Reponsebillet $reponsebillets
     * @return Billet
     */
    public function addReponsebillet(\Users\UserBundle\Entity\Reponsebillet $reponsebillets)
    {
        $this->reponsebillets[] = $reponsebillets;

        return $this;
    }

    /**
     * Remove reponsebillets
     *
     * @param \Users\UserBundle\Entity\Reponsebillet $reponsebillets
     */
    public function removeReponsebillet(\Users\UserBundle\Entity\Reponsebillet $reponsebillets)
    {
        $this->reponsebillets->removeElement($reponsebillets);
    }

    /**
     * Get reponsebillets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReponsebillets()
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
     *
     * @param \Produit\ProduitBundle\Entity\Produitpanier $produitpanier
     * @return Billet
     */
    public function setProduitpanier(\Produit\ProduitBundle\Entity\Produitpanier $produitpanier = null)
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
     *
     * @return \Produit\ProduitBundle\Entity\Produitpanier 
     */
    public function getProduitpanier()
    {
        return $this->produitpanier;
    }

    /**
     * Set panier
     *
     * @param \Produit\ProduitBundle\Entity\Panier $panier
     * @return Billet
     */
    public function setPanier(\Produit\ProduitBundle\Entity\Panier $panier = null)
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
     *
     * @return \Produit\ProduitBundle\Entity\Panier 
     */
    public function getPanier()
    {
        return $this->panier;
    }
}
