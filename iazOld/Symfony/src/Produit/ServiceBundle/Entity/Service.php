<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use General\ServiceBundle\Servicetext\GeneralServicetext;
use General\ValidatorBundle\Validatortext\Siteweb;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Service
 *
 * @ORM\Table("service")
 * @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\ServiceRepository")
 */
class Service
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
     * @ORM\Column(name="description", type="text")
     *@Taillemin(valeur=3, message="Au moins 3 caractères")
     *@Taillemax(valeur=1000, message="Au plus 1000 caractès")
     */
    private $description;
	
	/**
     * @var string
     *
     * @ORM\Column(name="breve", type="string", length=255, nullable=true)
     *@Taillemin(valeur=3, message="Au moins 3 caractères")
     *@Taillemax(valeur=40, message="Au plus 40 caractès")
     */
    private $breve;
	
	/**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=255, nullable=true)
     *@Taillemax(valeur=250, message="Au plus 250 caractès")
     */
    private $keyword;
	
	/**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     *@Siteweb()
     */
    private $link;
	
	/**
     * @var string
     *
     * @ORM\Column(name="nomcompte", type="string", length=255, nullable=true)
     */
    private $nomcompte;
	
	/**
     * @var string
     *
     * @ORM\Column(name="numcompte", type="string", length=255, nullable=true)
     */
    private $numcompte;

	/**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="principal", type="boolean")
     */
    private $principal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=false)
      */
	private $user;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Souscategorie")
       * @ORM\JoinColumn(nullable=true)
      */
	private $souscategorie;
	
	/**
	   * @ORM\OneToOne(targetEntity="Produit\ServiceBundle\Entity\Imgservice",  cascade={"persist","remove"})
	   * @ORM\JoinColumn(nullable=true)
	   *@Assert\Valid()
     */
	private $imgservice;
	
	/**
	 * @ORM\OneToMany(targetEntity="Produit\ServiceBundle\Entity\Evenement", mappedBy="service")
	 */
    private $evenements;
	
	/**
	 * @ORM\OneToMany(targetEntity="Produit\ServiceBundle\Entity\Commentaireblog", mappedBy="service")
	*/
    private $commentaireblogs;
	
	/**
	 * @ORM\OneToMany(targetEntity="Produit\ServiceBundle\Entity\Ressourcearticle", mappedBy="service")
	*/
    private $ressourcearticles;
	
	/**
     * @var string
     *
     * @ORM\Column(name="typearticle", type="string", length=255)
    */
    private $typearticle;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Typearticle", inversedBy="services")
       * @ORM\JoinColumn(nullable=true)
      */
	private $type;
	
	// variable du service de normalisation des noms des pays.
	private $servicetext;
	
	private $em;
	
	public function __construct(GeneralServicetext $service)
	{
		$this->servicetext = $service;
		$this->date = new \Datetime();
		$this->principal = false;
		$this->evenements = new \Doctrine\Common\Collections\ArrayCollection();
		$this->commentaireblogs = new \Doctrine\Common\Collections\ArrayCollection();
		$this->ressourcearticles = new \Doctrine\Common\Collections\ArrayCollection();
	}

	public function setServicetext( GeneralServicetext $service)
    {
		$this->servicetext = $service;
    }
	
    public function getServicetext()
    {
		return $this->servicetext;
    }
	
	public function setEm($em)
	{
		$this->em = $em;
	}
	
	public function getEm()
	{
		return $this->em;
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
     * @return Service
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
     * Set description
     *
     * @param string $description
     * @return Service
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
     * @return Service
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
     * @return Service
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
     * Set imgservice
     *
     * @param \Produit\ServiceBundle\Entity\Imgservice $imgservice
     * @return Service
     */
    public function setImgservice(\Produit\ServiceBundle\Entity\Imgservice $imgservice)
    {
        $this->imgservice = $imgservice;

        return $this;
    }

    /**
     * Get imgservice
     *
     * @return \Produit\ServiceBundle\Entity\Imgservice 
     */
    public function getImgservice()
    {
        return $this->imgservice;
    }

    /**
     * Add evenements
     *
     * @param \Produit\ServiceBundle\Entity\Evenement $evenements
     * @return Service
     */
    public function addEvenement(\Produit\ServiceBundle\Entity\Evenement $evenements)
    {
        $this->evenements[] = $evenements;

        return $this;
    }

    /**
     * Remove evenements
     *
     * @param \Produit\ServiceBundle\Entity\Evenement $evenements
     */
    public function removeEvenement(\Produit\ServiceBundle\Entity\Evenement $evenements)
    {
        $this->evenements->removeElement($evenements);
    }

    /**
     * Get evenements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvenements()
    {
        return $this->evenements;
    }

    /**
     * Add commentaireblogs
     *
     * @param \Produit\ServiceBundle\Entity\Commentaireblog $commentaireblogs
     * @return Service
     */
    public function addCommentaireblog(\Produit\ServiceBundle\Entity\Commentaireblog $commentaireblogs)
    {
        $this->commentaireblogs[] = $commentaireblogs;

        return $this;
    }

    /**
     * Remove commentaireblogs
     *
     * @param \Produit\ServiceBundle\Entity\Commentaireblog $commentaireblogs
     */
    public function removeCommentaireblog(\Produit\ServiceBundle\Entity\Commentaireblog $commentaireblogs)
    {
        $this->commentaireblogs->removeElement($commentaireblogs);
    }

    /**
     * Get commentaireblogs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaireblogs()
    {
        return $this->commentaireblogs;
    }

    /**
     * Set typearticle
     *
     * @param string $typearticle
     * @return Service
     */
    public function setTypearticle($typearticle)
    {
        $this->typearticle = $typearticle;

        return $this;
    }

    /**
     * Get typearticle
     *
     * @return string 
     */
    public function getTypearticle()
    {
        return $this->typearticle;
    }

    /**
     * Set type
     *
     * @param \Produit\ServiceBundle\Entity\Typearticle $type
     * @return Service
     */
    public function setType(\Produit\ServiceBundle\Entity\Typearticle $type = null)
    {
        $this->type = $type;
		if($type != null)
		{
			$type->addService($this);
		}

        return $this;
    }

    /**
     * Get type
     *
     * @return \Produit\ServiceBundle\Entity\Typearticle 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set breve
     *
     * @param string $breve
     * @return Service
     */
    public function setBreve($breve)
    {
        $this->breve = $breve;

        return $this;
    }

    /**
     * Get breve
     *
     * @return string 
     */
    public function getBreve()
    {
        return $this->breve;
    }

    /**
     * Set keyword
     *
     * @param string $keyword
     * @return Service
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Service
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set nomcompte
     *
     * @param string $nomcompte
     * @return Service
     */
    public function setNomcompte($nomcompte)
    {
        $this->nomcompte = $nomcompte;

        return $this;
    }

    /**
     * Get nomcompte
     *
     * @return string 
     */
    public function getNomcompte()
    {
        return $this->nomcompte;
    }

    /**
     * Set numcompte
     *
     * @param string $numcompte
     * @return Service
     */
    public function setNumcompte($numcompte)
    {
        $this->numcompte = $numcompte;

        return $this;
    }

    /**
     * Get numcompte
     *
     * @return string 
     */
    public function getNumcompte()
    {
        return $this->numcompte;
    }

    /**
     * Set rang
     *
     * @param integer $rang
     * @return Service
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
     * Set souscategorie
     *
     * @param \Produit\ProduitBundle\Entity\Souscategorie $souscategorie
     * @return Service
     */
    public function setSouscategorie(\Produit\ProduitBundle\Entity\Souscategorie $souscategorie = null)
    {
        $this->souscategorie = $souscategorie;

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
	
	public function getPartiearticles()
	{
		$liste_partie = $this->em->getRepository('ProduitServiceBundle:Evenement')
	                         ->findBy(array('service'=>$this, 'typearticle'=>'autres'),array('rang'=>'asc'));
		return $liste_partie;
	}

    /**
     * Set principal
     *
     * @param boolean $principal
     * @return Service
    */
	
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Get principal
     *
     * @return boolean 
    */
	
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Add ressourcearticles
     *
     * @param \Produit\ServiceBundle\Entity\Ressourcearticle $ressourcearticles
     * @return Service
     */
    public function addRessourcearticle(\Produit\ServiceBundle\Entity\Ressourcearticle $ressourcearticles)
    {
        $this->ressourcearticles[] = $ressourcearticles;

        return $this;
    }

    /**
     * Remove ressourcearticles
     *
     * @param \Produit\ServiceBundle\Entity\Ressourcearticle $ressourcearticles
     */
    public function removeRessourcearticle(\Produit\ServiceBundle\Entity\Ressourcearticle $ressourcearticles)
    {
        $this->ressourcearticles->removeElement($ressourcearticles);
    }

    /**
     * Get ressourcearticles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRessourcearticles()
    {
        return $this->ressourcearticles;
    }
}
