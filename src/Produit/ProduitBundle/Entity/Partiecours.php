<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

/**
 * Partiecours
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\PartiecoursRepository")
 */
class Partiecours
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
     * @ORM\Column(name="titre", type="string", length=255)
    *@Taillemin(valeur=3, message="Au moins 3 caractères")
     *@Taillemax(valeur=70, message="Au plus 70 caractès")
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Produit")
       * @ORM\JoinColumn(nullable=false)
        */
	private $produit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	private $em;
	
	public function __construct()
	{
		$this->date = new \Datetime();
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
     * Set titre
     *
     * @param string $titre
     * @return Partiecours
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
     * Set rang
     *
     * @param integer $rang
     * @return Partiecours
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
     * Set date
     *
     * @param \DateTime $date
     * @return Partiecours
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
     * Set produit
     *
     * @param \Produit\ProduitBundle\Entity\Produit $produit
     * @return Partiecours
     */
    public function setProduit(\Produit\ProduitBundle\Entity\Produit $produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Produit\ProduitBundle\Entity\Produit 
     */
    public function getProduit()
    {
        return $this->produit;
    }
	
	public function name($tail)
	{
		if(strlen($this->titre) <= $tail)
		{
		return $this->titre;
		}else{
		$text = wordwrap($this->titre,$tail,'~',true);
		$tab = explode('~',$text);
		$text = $tab[0];
		return $text.'..';
		}
	}
	
	public function getRessources()
	{
		$liste_chapitre = $this->em->getRepository('ProduitProduitBundle:Chapitrecours')
								->findBy(array('partiecours'=>$this,'type'=>1), array('rang'=>'asc'));
		return $liste_chapitre;
	}
	
	public function getChapitres()
	{
		$liste_chapitre = $this->em->getRepository('ProduitProduitBundle:Chapitrecours')
								->findBy(array('partiecours'=>$this,'type'=>0), array('rang'=>'asc'));
		return $liste_chapitre;
	}
	
	public function getConclusion()
	{
		$liste_chapitre = $this->em->getRepository('ProduitProduitBundle:Chapitrecours')
								->findBy(array('partiecours'=>$this,'type'=>2), array('rang'=>'asc'));
		return $liste_chapitre;
	}
}
