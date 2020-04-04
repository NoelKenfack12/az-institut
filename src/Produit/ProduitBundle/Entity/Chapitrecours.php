<?php

namespace Produit\ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;
use General\ServiceBundle\Servicetext\GeneralServicetext;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Chapitrecours
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ProduitBundle\Entity\ChapitrecoursRepository")
 */
class Chapitrecours
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
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", nullable=true)
     *@Taillemax(valeur=10000, message="Au plus 10000 caractès")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ProduitBundle\Entity\Partiecours")
       * @ORM\JoinColumn(nullable=false)
        */
	private $partiecours;
	
	/**
       * @ORM\OneToOne(targetEntity="Produit\ProduitBundle\Entity\Videochapitre", cascade={"persist", "remove"})
      * @Assert\Valid()
       */
   private $videochapitre;
   
   /**
       * @ORM\OneToOne(targetEntity="Produit\ProduitBundle\Entity\Imgchapitre", cascade={"persist", "remove"})
      * @Assert\Valid()
       */
   private $imgchapitre;
   
   /**
         * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Supportchapitre", mappedBy="chapitrecours")
         */
    private $supportchapitres;
	
	/**
         * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Pratiquechapitre", mappedBy="chapitrecours")
         */
    private $pratiquechapitres;
	
	/**
         * @ORM\OneToMany(targetEntity="Produit\ProduitBundle\Entity\Exercicepartie", mappedBy="chapitrecours")
         */
    private $exerciceparties;
	
	private $em;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->supportchapitres = new \Doctrine\Common\Collections\ArrayCollection();
		$this->pratiquechapitres = new \Doctrine\Common\Collections\ArrayCollection();
		$this->exerciceparties = new \Doctrine\Common\Collections\ArrayCollection();
		$this->type = 0;
	}
	
	public function getEm()
	{
		return $this->em;
	}
	
	public function setEm($em)
	{
		$this->em = $em;
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
     * @return Chapitrecours
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
     * Set contenu
     *
     * @param string $contenu
     * @return Chapitrecours
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Chapitrecours
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
     * Set rang
     *
     * @param integer $rang
     * @return Chapitrecours
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

    /**
     * Set partiecours
     *
     * @param \Produit\ProduitBundle\Entity\Partiecours $partiecours
     * @return Chapitrecours
     */
    public function setPartiecours(\Produit\ProduitBundle\Entity\Partiecours $partiecours)
    {
        $this->partiecours = $partiecours;

        return $this;
    }

    /**
     * Get partiecours
     *
     * @return \Produit\ProduitBundle\Entity\Partiecours 
     */
    public function getPartiecours()
    {
        return $this->partiecours;
    }

    /**
     * Set videochapitre
     *
     * @param \Produit\ProduitBundle\Entity\Videochapitre $videochapitre
     * @return Chapitrecours
     */
    public function setVideochapitre(\Produit\ProduitBundle\Entity\Videochapitre $videochapitre = null)
    {
        $this->videochapitre = $videochapitre;

        return $this;
    }

    /**
     * Get videochapitre
     *
     * @return \Produit\ProduitBundle\Entity\Videochapitre 
     */
    public function getVideochapitre()
    {
        return $this->videochapitre;
    }

    /**
     * Set imgchapitre
     *
     * @param \Produit\ProduitBundle\Entity\Imgchapitre $imgchapitre
     * @return Chapitrecours
     */
    public function setImgchapitre(\Produit\ProduitBundle\Entity\Imgchapitre $imgchapitre = null)
    {
        $this->imgchapitre = $imgchapitre;

        return $this;
    }

    /**
     * Get imgchapitre
     *
     * @return \Produit\ProduitBundle\Entity\Imgchapitre 
     */
    public function getImgchapitre()
    {
        return $this->imgchapitre;
    }

    /**
     * Add supportchapitres
     *
     * @param \Produit\ProduitBundle\Entity\Supportchapitre $supportchapitres
     * @return Chapitrecours
     */
    public function addSupportchapitre(\Produit\ProduitBundle\Entity\Supportchapitre $supportchapitres)
    {
        $this->supportchapitres[] = $supportchapitres;

        return $this;
    }

    /**
     * Remove supportchapitres
     *
     * @param \Produit\ProduitBundle\Entity\Supportchapitre $supportchapitres
     */
    public function removeSupportchapitre(\Produit\ProduitBundle\Entity\Supportchapitre $supportchapitres)
    {
        $this->supportchapitres->removeElement($supportchapitres);
    }

    /**
     * Get supportchapitres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSupportchapitres()
    {
        return $this->supportchapitres;
    }

    /**
     * Add pratiquechapitres
     *
     * @param \Produit\ProduitBundle\Entity\Pratiquechapitre $pratiquechapitres
     * @return Chapitrecours
     */
    public function addPratiquechapitre(\Produit\ProduitBundle\Entity\Pratiquechapitre $pratiquechapitres)
    {
        $this->pratiquechapitres[] = $pratiquechapitres;

        return $this;
    }

    /**
     * Remove pratiquechapitres
     *
     * @param \Produit\ProduitBundle\Entity\Pratiquechapitre $pratiquechapitres
     */
    public function removePratiquechapitre(\Produit\ProduitBundle\Entity\Pratiquechapitre $pratiquechapitres)
    {
        $this->pratiquechapitres->removeElement($pratiquechapitres);
    }

    /**
     * Get pratiquechapitres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPratiquechapitres()
    {
        return $this->pratiquechapitres;
    }

    /**
     * Add exerciceparties
     *
     * @param \Produit\ProduitBundle\Entity\Exercicepartie $exerciceparties
     * @return Chapitrecours
     */
    public function addExerciceparty(\Produit\ProduitBundle\Entity\Exercicepartie $exerciceparties)
    {
        $this->exerciceparties[] = $exerciceparties;

        return $this;
    }

    /**
     * Remove exerciceparties
     *
     * @param \Produit\ProduitBundle\Entity\Exercicepartie $exerciceparties
     */
    public function removeExerciceparty(\Produit\ProduitBundle\Entity\Exercicepartie $exerciceparties)
    {
        $this->exerciceparties->removeElement($exerciceparties);
    }

    /**
     * Get exerciceparties
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExerciceparties()
    {
        return $this->exerciceparties;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Chapitrecours
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }
	
	public function getNoteQuestionnaire($prodpan)
	{
		$liste_compos_user = $this->em->getRepository('ProduitProduitBundle:Composquestionnaire')
							      ->myfindComposquestionnaire($prodpan->getId(),$this->getId());
							
		$liste_questionnaire = $this->em->getRepository('ProduitProduitBundle:Questionnaire')
	                                ->findBy(array('chapitrecours'=>$this), array('date'=>'asc'));
		$nbrequestion = count($liste_compos_user);
		$servicetext = new GeneralServicetext();
		$trouver = 0;
		foreach($liste_questionnaire as $question)
		{
			$oldcompos = $this->em->getRepository('ProduitProduitBundle:Composquestionnaire')
							  ->findOneBy(array('produitpanier'=>$prodpan,'questionnaire'=>$question));
			if($oldcompos != null and $oldcompos->getProposition() != null)
			{
				$bestpro = null;
				foreach($question->getPropositions() as $prop)
				{
					if($prop->getReponse() == true)
					{
						$bestpro = $prop;
					}
				}
				
				if($bestpro == $oldcompos->getProposition())
				{
					$trouver = $trouver + 1;
				}
			}
		}
		if($nbrequestion > 0)
		{
			return ($servicetext->getBareme()*$trouver)/$nbrequestion;
		}else{
			return 0;
		}
	}
	
	public function getNoteExercice($prodpan)
	{
		if($prodpan == null)
		{
			return 0;
		}
		$liste_compos_user = $this->em->getRepository('ProduitProduitBundle:Composexercice')
							      ->myfindComposexercice($prodpan->getId(),$this->getId());
								  
		$nbrequestion = count($this->getExerciceparties());
		$servicetext = new GeneralServicetext();
		$point = 0;
		foreach($liste_compos_user as $compos)
		{
			$point = $point + $compos->getNote();
		}
		
		if($nbrequestion > 0)
		{
			return ceil($point/$nbrequestion);
		}else{
			return 0;
		}
	}
	
	public function getNotePratique($prodpan)
	{
		if($prodpan == null)
		{
			return 0;
		}
		$liste_compos_user = $this->em->getRepository('ProduitProduitBundle:Compospratique')
							      ->myfindCompospratique($prodpan->getId(),$this->getId());
								  
		$nbrequestion = count($this->getPratiquechapitres());
		$servicetext = new GeneralServicetext();
		$point = 0;
		foreach($liste_compos_user as $compos)
		{
			$point = $point + $compos->getNote();
		}
		
		if($nbrequestion > 0)
		{
			return ceil($point/$nbrequestion);
		}else{
			return 0;
		}
	}
}
