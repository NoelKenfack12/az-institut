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
 * Application
 *
 * @ORM\Table("application")
 * @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\ApplicationRepository")
  * @UniqueEntity(fields="siteweb", message="Ce site est déjà enregistré.")
 * @UniqueEntity(fields="nom", message="Ce pays est déjà enregistré.")
  ** @ORM\HasLifecycleCallbacks
 */
 
class Application
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
     * @ORM\Column(name="description", type="text")
     *@Taillemin(valeur=3, message="Au moins 3 caractères")
     *@Taillemax(valeur=250, message="Au plus 250 caractès")
     */
    private $description;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=255,unique=true,nullable=true)
     *@Siteweb()
     */
    private $siteweb;
	
	/**
	* @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Categorieappli", inversedBy="applications")
	* @ORM\JoinColumn(nullable=false)
	*/
    private $categorieappli;
	
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
		$this->rang = 0;
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
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function premajuscule()
	{
	$this->nom =  ucfirst($this->nom);
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
	return 'bundles/produit/service/images/application';
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
     * Set categorieappli
     *
     * @param \Produit\ServiceBundle\Entity\Categorieappli $categorieappli
     * @return Application
     */
    public function setCategorieappli(\Produit\ServiceBundle\Entity\Categorieappli $categorieappli)
    {
        $this->categorieappli = $categorieappli;
		$categorieappli->addApplication($this);

        return $this;
    }

    /**
     * Get categorieappli
     *
     * @return \Produit\ServiceBundle\Entity\Categorieappli 
     */
    public function getCategorieappli()
    {
        return $this->categorieappli;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Application
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
     * Set rang
     *
     * @param integer $rang
     * @return Application
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
}
