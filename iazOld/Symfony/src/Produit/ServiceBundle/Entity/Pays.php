<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use General\ValidatorBundle\Validatortext\Siteweb;
use General\ServiceBundle\Servicetext\GeneralServicetext;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use General\ValidatorBundle\Validatorfile\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Pays
 *
 * @ORM\Table("pays")
 * @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\PaysRepository")
  * @UniqueEntity(fields="siteweb", message="Ce site est déjà enregistré.")
 * @UniqueEntity(fields="nom", message="Ce pays est déjà enregistré.")
  * @UniqueEntity(fields="code", message="Ce code existe déjà.")
  ** @ORM\HasLifecycleCallbacks
 */
 
class Pays
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
     * @ORM\Column(name="nom", type="string", length=255,unique=true)
     *@Taillemin(valeur=4,message="Au moins 4 caractères")
     *@Taillemax(valeur=60, message="Au plus 60 caractères")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=255,unique=true,nullable=true)
     *@Siteweb()
     */
    private $siteweb;

    /**
     * @var string
     *
     * @ORM\Column(name="citoyen", type="string", length=255,nullable=true)
     *@Taillemax(valeur=60, message="Au plus 60 caractères")
     */
    private $citoyen;
	
	/**
     * @var string
     *
     * @ORM\Column(name="citoyenne", type="string", length=255,nullable=true)
     *@Taillemax(valeur=60, message="Au plus 60 caractères")
     */
    private $citoyenne;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255,unique=true,nullable=true)
     */
    private $code;
	
	/**
     * @var string
     *
     * @ORM\Column(name="domaine", type="string", length=255,unique=true,nullable=true)
     */
    private $domaine;
	
	/**
         * @ORM\OneToMany(targetEntity="Users\UserBundle\Entity\User", mappedBy="pays")
         */
    private $users;
	
	/**
         * @ORM\OneToMany(targetEntity="Users\UserBundle\Entity\Contacts", mappedBy="pays")
         */
    private $contacts;
	
	/**
           * @ORM\OneToOne(targetEntity="Produit\ServiceBundle\Entity\Drapeau",  cascade={"persist","remove"})
           * @ORM\JoinColumn(nullable=true)
	*@Assert\Valid()
          */
	private $drapeau;
	
	/**
	* @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Continent", inversedBy="pays")
	* @ORM\JoinColumn(nullable=false)
	*/
    private $continent;
	
	/**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=255,nullable=true)
     */
    private $src;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255,nullable=true)
     */
    private $alt;
	
	/**
	*@Image(taillemax=1500000, message="la taille de l'image  %string% est grande.")
	*/
	private $file;
	
	// permet le stocage temporaire du nom du fichier
	private $tempFilename;
	
	// variable du service de normalisation des noms de fichier
	private $servicetext;
	
	
	public function __construct(GeneralServicetext $service)
	{
		$this->users = new \Doctrine\Common\Collections\ArrayCollection();
		$this->servicetext = $service;
		$this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Pays
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
     * Set siteweb
     *
     * @param string $siteweb
     * @return Pays
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    /**
     * Get siteweb
     *
     * @return string 
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set citoyen
     *
     * @param string $citoyen
     * @return Pays
     */
    public function setCitoyen($citoyen)
    {
        $this->citoyen = $citoyen;

        return $this;
    }

    /**
     * Get citoyen
     *
     * @return string 
     */
    public function getCitoyen()
    {
        return $this->citoyen;
    }

	 /**
     * Set code
     *
     * @param string $citoyen
     * @return Pays
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

	 /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
	
	/**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function premajuscule()
	{
	$this->nom =  ucfirst($this->nom);
	$this->citoyen =  ucfirst($this->citoyen);
	$this->citoyenne = ucfirst($this->citoyenne);
	}


    /**
     * Set citoyenne
     *
     * @param string $citoyenne
     * @return Pays
     */
    public function setCitoyenne($citoyenne)
    {
        $this->citoyenne = $citoyenne;

        return $this;
    }

    /**
     * Get citoyenne
     *
     * @return string 
     */
    public function getCitoyenne()
    {
        return $this->citoyenne;
    }
	
	public function name($tail)
	{
		if(strlen($this->nom) <= $tail)
		{
		return $this->nom;
		}else{
		$text = wordwrap($this->nom,$tail,'~',true);
		$tab = explode('~',$text);
		$text = $tab[0];
		return $text.'...';
		}
	}

    /**
     * Add users
     *
     * @param \Users\UserBundle\Entity\User $users
     * @return Pays
     */
    public function addUser(\Users\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Users\UserBundle\Entity\User $users
     */
    public function removeUser(\Users\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set domaine
     *
     * @param string $domaine
     * @return Pays
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return string 
     */
    public function getDomaine()
    {
        return $this->domaine;
    }
	
	//permet la récupération du nom du fichier temporaire
    public function getTempFilename()
    {
    return $this->tempFilename;
    }
	//permet de modifier le contenu de la variable tempFilename
    public function setTempFilename($temp)
	{
	$this->tempFilename=$temp;
	}
	// permet la récupération du nom du fiechier
	public function getFile()
	{
	return $this->file;
	}
	public function setServicetext(GeneralServicetext $service)
	{
	$this->servicetext = $service;
	}
	public function getServicetext()
	{
	return $this->servicetext;
	}
	public function getUploadDir()
	{
	// On retourne le chemin relatif vers l'image pour un navigateur
	return 'bundles/produit/service/images/pays';
	}
	protected function getUploadRootDir()
	{
	// On retourne le chemin relatif vers l'image pour notre codePHP
	return  __DIR__.'/../../../../web/'.$this->getUploadDir();
	}
	public function setFile(UploadedFile $file)
	{
	$this->file = $file;
	// On vérifie si on avait déjà un fichier pour cette entité
	if (null !== $this->src) {
	// On sauvegarde l'extension du fichier pour le supprimer plus tard
	$this->tempFilename = $this->src;
	// On réinitialise les valeurs des attributs url et alt
	$this->src = null;
	$this->alt = null;
	}
	}
	/**
	* @ORM\PrePersist()
	* @ORM\PreUpdate()
	*/
	public function preUpload()
	{
	if (null === $this->file) {
	return;
	}
	$text = $this->file->getClientOriginalName();
	$this->src = $this->servicetext->normaliseText($text);
	$this->alt = $this->src;
	}
	/**
	* @ORM\PostPersist()
	* @ORM\PostUpdate()
	*/
	public function upload()
	{
	// Si jamais il n'y a pas de fichier (champ facultatif)
	if (null === $this->file) {
	return;
	}
	if (null !== $this->tempFilename) {
	$oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
	if (file_exists($oldFile)) {
	unlink($oldFile);
	}
	}
	$this->file->move( $this->getUploadRootDir(), $this->id.'.'.$this->src);
	}
	/**
	*@ORM\PreRemove()
	*/
	public function preRemoveUpload()
	{
	$this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->src;
	}
 
	/**
	* @ORM\PostRemove()
	*/
	public function postRemoveUpload()
	{
	// En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
	if (file_exists($this->tempFilename)) {
	// On supprime le fichier
	unlink($this->tempFilename);
	}
	}

	public function getWebPath()
	{
	return $this->getUploadDir().'/'.$this->getId().'.'.$this->getSrc();
	}

    /**
     * Set src
     *
     * @param string $src
     * @return Pays
     */
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string 
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Pays
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set drapeau
     *
     * @param \Produit\ServiceBundle\Entity\Drapeau $drapeau
     * @return Pays
     */
    public function setDrapeau(\Produit\ServiceBundle\Entity\Drapeau $drapeau = null)
    {
        $this->drapeau = $drapeau;

        return $this;
    }

    /**
     * Get drapeau
     *
     * @return \Produit\ServiceBundle\Entity\Drapeau 
     */
    public function getDrapeau()
    {
        return $this->drapeau;
    }

    /**
     * Set continent
     *
     * @param \Produit\ServiceBundle\Entity\Continent $continent
     * @return Pays
     */
    public function setContinent(\Produit\ServiceBundle\Entity\Continent $continent)
    {
        $this->continent = $continent;
		$continent->addPay($this);

        return $this;
    }

    /**
     * Get continent
     *
     * @return \Produit\ServiceBundle\Entity\Continent 
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Add contacts
     *
     * @param \Users\UserBundle\Entity\Contacts $contacts
     * @return Pays
     */
    public function addContact(\Users\UserBundle\Entity\Contacts $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \Users\UserBundle\Entity\Contacts $contacts
     */
    public function removeContact(\Users\UserBundle\Entity\Contacts $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }
}
