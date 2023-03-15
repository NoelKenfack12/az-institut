<?php

namespace Users\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Email;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use General\ValidatorBundle\Validatortext\Password;
use General\ValidatorBundle\Validatortext\Telephone;

/**
 * Contacts
 *
* @ORM\Table("contacts")
 * @ORM\Entity(repositoryClass="Users\UserBundle\Entity\ContactsRepository")
 */
class Contacts
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255,nullable=true)
     *@Taillemax(valeur=100, message="Le nom publique doit avoir au plus 100 caractès")
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     *@Taillemin(valeur=2, message="Le nom du proprio doit avoir au moins 2 caractères")
     *@Taillemax(valeur=100, message="Le nom proprio doit avoir au plus 100 caractès")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="structname", type="string", length=255,nullable=true)
     *@Taillemax(valeur=100, message="Le nom de l'organisation doit avoir au plus 100 caractès")
     */
    private $structname;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
      *@Taillemin(valeur=2, message="Le prenom proprio doit avoir au moins 2 caractères")
     *@Taillemax(valeur=100, message="Le prenom du proprio doit avoir au plus 100 caractès")
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255,nullable=true)
     *@Taillemax(valeur=100, message="L'adresse doit avoir au plus 100 caractès")
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255,nullable=true)
     *@Taillemax(valeur=100, message="Le nom de la ville doit avoir au plus 100 caractès")
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
      *@Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     *@Telephone()
     */
    private $tel;
	
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=true)
        */
	private $user;
	
	/**
         * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Panier", mappedBy="contact")
         */
    private $paniers;
	
	/**
      * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Pays", inversedBy="contacts")
      * @ORM\JoinColumn(nullable=true)
      */
    private $pays;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->paniers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set type
     *
     * @param string $type
     * @return Contacts
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Contacts
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Contacts
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
     * Set structname
     *
     * @param string $structname
     * @return Contacts
     */
    public function setStructname($structname)
    {
        $this->structname = $structname;

        return $this;
    }

    /**
     * Get structname
     *
     * @return string 
     */
    public function getStructname()
    {
        return $this->structname;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Contacts
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Contacts
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Contacts
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contacts
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Contacts
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
     * Set date
     *
     * @param \DateTime $date
     * @return Contacts
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
     * @return Contacts
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
     * Add paniers
     *
     * @param \Produit\ProduitBundle\Entity\Panier $paniers
     * @return Contacts
     */
    public function addPanier(\Produit\ProduitBundle\Entity\Panier $paniers)
    {
        $this->paniers[] = $paniers;

        return $this;
    }

    /**
     * Remove paniers
     *
     * @param \Produit\ProduitBundle\Entity\Panier $paniers
     */
    public function removePanier(\Produit\ProduitBundle\Entity\Panier $paniers)
    {
        $this->paniers->removeElement($paniers);
    }

    /**
     * Get paniers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPaniers()
    {
        return $this->paniers;
    }

    /**
     * Set pays
     *
     * @param \Produit\ServiceBundle\Entity\Pays $pays
     * @return Contacts
     */
    public function setPays(\Produit\ServiceBundle\Entity\Pays $pays = null)
    {
        $this->pays = $pays;
		if($pays != null)
		{
			$pays->addContact($this);
		}

        return $this;
    }

    /**
     * Get pays
     *
     * @return \Produit\ServiceBundle\Entity\Pays 
     */
    public function getPays()
    {
        return $this->pays;
    }
	
	public function name($tail)
	{
		$allname = $this->nom.' '.$this->prenom;
		if(strlen($allname) <= $tail)
		{
			return $allname;
		}else{
			$text = wordwrap($allname,$tail,'~',true);
			$tab = explode('~',$text);
			$text = $tab[0];
			return $text.'...';
		}
	}
}
