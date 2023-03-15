<?php

namespace App\Entity\Produit\Produit;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Validator\Validatortext\Siteweb;
use App\Service\Servicetext\GeneralServicetext;
use App\Validator\Validatorfile\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repository\Produit\Produit\SouscategorieRepository;
use App\Entity\Users\User\User;
use App\Entity\Produit\Produit\Categorie;
use App\Entity\Produit\Produit\Cataloguechantier;
use App\Entity\Produit\Produit\Produit;
use App\Entity\Produit\Produit\Caracteristique;
use Doctrine\Common\Collections\Collection;

/**
 * Souscategorie
 *
 * @ORM\Table("souscategorie")
 * @ORM\Entity(repositoryClass=SouscategorieRepository::class)
 ** @ORM\HasLifecycleCallbacks
*/
class Souscategorie
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
     * @Taillemax(valeur=70, message="Au plus 70 caractès")
    */
    private $nom;
	
	/**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     * @Taillemin(valeur=3, message="Au moins 3 caractères")
     * @Taillemax(valeur=500, message="Au plus 500 caractès")
     */
    private $description;
	
	/**
     * @var text
     *
     * @ORM\Column(name="helpdashboard", type="text", nullable=true)
     * @Taillemax(valeur=500, message="Au plus 500 caractès")
     */
    private $helpdashboard;
	
	/**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255,nullable=true)
     * @Siteweb()
    */
    private $link;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="nbvente", type="integer")
     */
	private $nbvente;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;
	
	/**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=255, nullable=true)
     */
    private $src;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;
	
	/**
	* @Image(taillemax=1500000, message="la taille de l'image  %string% est grande.")
	*/
	private $file;
	
	// permet le stocage temporaire du nom du fichier
	private $tempFilename;
	

	/**
      * @ORM\ManyToOne(targetEntity=User::class)
      * @ORM\JoinColumn(nullable=false)
    */
    private $user;
	
	 /**
       * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="souscategories")
       * @ORM\JoinColumn(nullable=false)
    */
	private $categorie;
	
	 /**
       * @ORM\ManyToOne(targetEntity=Cataloguechantier::class, inversedBy="souscategories")
       * @ORM\JoinColumn(nullable=true)
    */
	private $cataloguechantier;
	
	/**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="souscategorie")
     */
    private $produits;
	
	/**
	 * @ORM\OneToMany(targetEntity=Caracteristique::class, mappedBy="souscategorie")
	 */
    private $caracteristiques;
	
	private $servicetext;
	
	private $element;
	
	private $em;
	
	public function __construct(GeneralServicetext $service)
	{
		$this->servicetext = $service;
		$this->date = new \Datetime();
		$this->produits = new \Doctrine\Common\Collections\ArrayCollection();
		$this->caracteristiques = new \Doctrine\Common\Collections\ArrayCollection();
		$this->nbvente = 0;
		$this->rang = 0;
		$this->domaine = false;
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
	
	public function getElement()
	{
		return $this->element;
	}
	
	public function setElement($element)
	{
		$this->element = $element;
		return $this;
	}
	
	public function getEm()
	{
		return $this->em;
	}
	
	public function setEm($em)
	{
		$this->em = $em;
		return $this;
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
     * @return Souscategorie
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
     * @return Souscategorie
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
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function premajuscule()
	{

	}

    /**
     * Set categorie
     * @return Souscategorie
     */
    public function setCategorie(Categorie $categorie): self
    {
        $this->categorie = $categorie;
		$categorie->addSouscategory($this);

        return $this;
    }

    /**
     * Get categorie 
     */
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    /**
     * Set user
     * @return Souscategorie
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
     * Add produits
     * @return Souscategorie
     */
    public function addProduit(Produit $produits): self
    {
        $this->produits[] = $produits;

        return $this;
    }

    /**
     * Remove produits
     */
    public function removeProduit(Produit $produits)
    {
        $this->produits->removeElement($produits);
    }

    /**
     * Get produits 
     */
    public function getProduits(): ?Collection
    {
        return $this->produits;
    }

    /**
     * Set nbvente
     *
     * @param integer $nbvente
     * @return Souscategorie
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
	
	public function getUploadDir()
	{
	// On retourne le chemin relatif vers l'image pour un navigateur
	return 'bundles/produit/produit/images/souscategorie';
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
     * Set description
     *
     * @param string $description
     * @return Souscategorie
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
     * @return Souscategorie
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
     * Set src
     *
     * @param string $src
     * @return Souscategorie
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
     * @return Souscategorie
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
     * Set link
     *
     * @param string $link
     * @return Souscategorie
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
     * Add caracteristiques
     * @return Souscategorie
     */
    public function addCaracteristique(Caracteristique $caracteristiques): self
    {
        $this->caracteristiques[] = $caracteristiques;

        return $this;
    }

    /**
     * Remove caracteristiques
     */
    public function removeCaracteristique(Caracteristique $caracteristiques)
    {
        $this->caracteristiques->removeElement($caracteristiques);
    }

    /**
     * Get caracteristiques
     */
    public function getCaracteristiques(): ?Collection
    {
        return $this->caracteristiques;
    }
	
	public function subdescription($tail)
	{
		if(strlen($this->description) <= $tail)
		{
			return $this->description;
		}else{
			$text = wordwrap($this->description,$tail,'~',true);
			$tab = explode('~',$text);
			$text = $tab[0];
			return $text.'...';
		}
	}

    /**
     * Set helpdashboard
     *
     * @param string $helpdashboard
     * @return Souscategorie
     */
    public function setHelpdashboard($helpdashboard)
    {
        $this->helpdashboard = $helpdashboard;

        return $this;
    }

    /**
     * Get helpdashboard
     *
     * @return string 
     */
    public function getHelpdashboard()
    {
        return $this->helpdashboard;
    }
	
	public function getProduitScat()
	{
		$liste_prod = $this->em->getRepository(Produit::class)
							   ->findBy(array('souscategorie'=>$this), array('rang'=>'asc'));
		return $liste_prod;
	}

    /**
     * Set cataloguechantier
     * @return Souscategorie
     */
    public function setCataloguechantier(Cataloguechantier $cataloguechantier = null): self
    {
        $this->cataloguechantier = $cataloguechantier;

        return $this;
    }

    /**
     * Get cataloguechantier
    */
    public function getCataloguechantier(): ?Cataloguechantier
    {
        return $this->cataloguechantier;
    }
}
