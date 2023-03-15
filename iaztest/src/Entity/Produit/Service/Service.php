<?php

namespace App\Entity\Produit\Service;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Service\Servicetext\GeneralServicetext;
use App\Validator\Validatortext\Siteweb;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\Produit\Service\ServiceRepository;
use App\Entity\Users\User\User;
use App\Entity\Produit\Produit\Souscategorie;
use App\Entity\Produit\Service\Imgservice;
use App\Entity\Produit\Service\Evenement;
use App\Entity\Produit\Service\Commentaireblog;
use App\Entity\Produit\Service\Typearticle;
use App\Entity\Produit\Service\Ressourcearticle;
use Doctrine\Common\Collections\Collection;

/**
 * Service
 *
 * @ORM\Table("service")
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
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
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
	private $user;
	
	/**
     * @ORM\ManyToOne(targetEntity=Souscategorie::class)
     * @ORM\JoinColumn(nullable=true)
     */
	private $souscategorie;
	
	/**
     * @ORM\OneToOne(targetEntity=Imgservice::class,  cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     *@Assert\Valid()
    */
	private $imgservice;
	
	/**
	 * @ORM\OneToMany(targetEntity=Evenement::class, mappedBy="service")
	 */
    private $evenements;
	
	/**
	 * @ORM\OneToMany(targetEntity=Commentaireblog::class, mappedBy="service")
	*/
    private $commentaireblogs;
	
	/**
	 * @ORM\OneToMany(targetEntity=Ressourcearticle::class, mappedBy="service")
	*/
    private $ressourcearticles;
	
	/**
     * @var string
     *
     * @ORM\Column(name="typearticle", type="string", length=255)
    */
    private $typearticle;
	
	/**
     * @ORM\ManyToOne(targetEntity=Typearticle::class, inversedBy="services")
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
     * @return Service
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
     * Set imgservice
     * @return Service
     */
    public function setImgservice(Imgservice $imgservice): self
    {
        $this->imgservice = $imgservice;

        return $this;
    }

    /**
     * Get imgservice
     */
    public function getImgservice(): ?Imgservice
    {
        return $this->imgservice;
    }

    /**
     * Add evenements
     * @return Service
     */
    public function addEvenement(Evenement $evenements): self
    {
        $this->evenements[] = $evenements;

        return $this;
    }

    /**
     * Remove evenements
     */
    public function removeEvenement(Evenement $evenements)
    {
        $this->evenements->removeElement($evenements);
    }

    /**
     * Get evenements 
     */
    public function getEvenements(): ?Collection
    {
        return $this->evenements;
    }

    /**
     * Add commentaireblogs
     * @return Service
     */
    public function addCommentaireblog(Commentaireblog $commentaireblogs): self
    {
        $this->commentaireblogs[] = $commentaireblogs;

        return $this;
    }

    /**
     * Remove commentaireblogs
     */
    public function removeCommentaireblog(Commentaireblog $commentaireblogs)
    {
        $this->commentaireblogs->removeElement($commentaireblogs);
    }

    /**
     * Get commentaireblogs
     */
    public function getCommentaireblogs(): ?Collection
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
     * @return Service
     */
    public function setType(Typearticle $type = null): self
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
     */
    public function getType(): ?Typearticle
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
     * @return Service
     */
    public function setSouscategorie(Souscategorie $souscategorie = null): self
    {
        $this->souscategorie = $souscategorie;

        return $this;
    }

    /**
     * Get souscategorie 
    */
	
    public function getSouscategorie(): ?Souscategorie
    {
        return $this->souscategorie;
    }
	
	public function getPartiearticles()
	{
		$liste_partie = $this->em->getRepository(Evenement::class)
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
     * @return Service
     */
    public function addRessourcearticle(Ressourcearticle $ressourcearticles): self
    {
        $this->ressourcearticles[] = $ressourcearticles;

        return $this;
    }

    /**
     * Remove ressourcearticles
     */
    public function removeRessourcearticle(Ressourcearticle $ressourcearticles)
    {
        $this->ressourcearticles->removeElement($ressourcearticles);
    }

    /**
     * Get ressourcearticles
     */
    public function getRessourcearticles(): ?Collection
    {
        return $this->ressourcearticles;
    }
    
}
