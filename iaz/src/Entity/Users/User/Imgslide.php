<?php

namespace App\Entity\Users\User;

use Doctrine\ORM\Mapping as ORM;
use App\Service\Servicetext\GeneralServicetext;
use App\Validator\Validatorfile\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Validatortext\Siteweb;
use App\Repository\Users\User\ImgslideRepository;
use App\Entity\Produit\Produit\Souscategorie;
use App\Entity\Users\User\User;
use App\Entity\Users\User\Backgroundslide;

/**
 * Imgslide
 *
 * @ORM\Table("imgslide")
 * @ORM\Entity(repositoryClass=ImgslideRepository::class)
 ** @ORM\HasLifecycleCallbacks
 */
class Imgslide
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
     * @ORM\Column(name="src", type="string", length=255)
     */
    private $src;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     * @Taillemin(valeur=3, message="Au moins 3 caractères")
     * @Taillemax(valeur=150, message="Au plus 30 caractès")
     */
    private $titre;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="slide", type="boolean")
     */
    private $slide;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     * @Taillemin(valeur=3, message="Au moins 3 caractères")
     * @Taillemax(valeur=160, message="Au plus 40 caractès")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
      * @ORM\ManyToOne(targetEntity=Souscategorie::class)
      * @ORM\JoinColumn(nullable=true)
      */
    private $souscategorie;
	
	/**
      * @ORM\ManyToOne(targetEntity=User::class)
      * @ORM\JoinColumn(nullable=false)
      */
    private $user;
	
	/**
     * @ORM\OneToOne(targetEntity=Backgroundslide::class,  cascade={"persist","remove"})
    * @ORM\JoinColumn(nullable=true)
    * @Assert\Valid()
    */
	private $backgroundslide;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;
	
	/**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255,nullable=true)
      *@Siteweb()
     */
    private $link;
	
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
        $this->src ="source";
        $this->alt ="alternatif";
        $this->servicetext = $service;
        $this->date = new \Datetime();
        $this->slide = true;
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
     * Set src
     *
     * @param string $src
     * @return Imgslide
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
     * @return Imgslide
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
     * Set titre
     *
     * @param string $titre
     * @return Imgslide
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
     * @return Imgslide
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
     * @return Imgslide
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
	
	public function setServicetext( GeneralServicetext $service)
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
	return 'bundles/users/user/images/imgslide';
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
     * Set user
     * @return Imgslide
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
     * @return Imgslide
     */
    public function setSouscategorie(Souscategorie $souscategorie): self
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

    /**
     * Set backgroundslide
     * @return Imgslide
     */
    public function setBackgroundslide(Backgroundslide $backgroundslide = null): self
    {
        $this->backgroundslide = $backgroundslide;

        return $this;
    }

    /**
     * Set rang
     *
     * @param integer $rang
     * @return Imgslide
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
     * Set link
     *
     * @param string $link
     * @return Imgslide
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
     * Set slide
     *
     * @param boolean $slide
     * @return Imgslide
     */
    public function setSlide($slide)
    {
        $this->slide = $slide;

        return $this;
    }

    /**
     * Get slide
     *
     * @return boolean 
     */
    public function getSlide()
    {
        return $this->slide;
    }

    /**
     * Get backgroundslide
     */
    public function getBackgroundslide(): ?Backgroundslide
    {
        return $this->backgroundslide;
    }
}
