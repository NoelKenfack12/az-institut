<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

/**
 * Intervention
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\InterventionRepository")
 ** @ORM\HasLifecycleCallbacks
 */
class Intervention
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="timestamp", type="bigint")
     */
    private $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
      *@Taillemax(valeur=2000, message="Au plus 2000 caractès")
     */
    private $contenu;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Commentaireblog",inversedBy="interventions")
       * @ORM\JoinColumn(nullable=false)
        */
	private $commentaireblog;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=true)
        */
	private $user;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->timestamp = time();
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
     * Set date
     *
     * @param \DateTime $date
     * @return Intervention
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
     * Set timestamp
     *
     * @param integer $timestamp
     * @return Intervention
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return integer 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Intervention
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
	
	public function getDuree()
	{
	$seconde = time() - $this->timestamp;
	$minute = round($seconde/60);
	if($minute < 60)
	{
	   if($minute < 3)
	   {
		   $duree = 'Il ya un instant';
	   }else{
		   $duree = 'Il ya '.$minute.' min';
	   }
	}else{
	   if($minute < 60*24)
	   {
	   $duree = 'Il ya '.(floor(($minute/60))).'h'.($minute%60).'min';
	   }else{
	      if($minute < 60*24*30)
		  {
		  $reste = $minute - (floor($minute/(60*24)))*(60*24);
		  $duree = 'Il ya '.(floor($minute/(60*24))).'j'.(floor($reste/60)).'h'.($reste - (floor($reste/60)*60)).'min';
		  }else{
		  $nbjour = $this->date->diff(new \Datetime())->days;
		  $age = floor($nbjour/365);
		  if($age < 1)
		  {
			  $reste = $nbjour - (floor($nbjour/(30)))*(30);
			  if(floor($nbjour/(30)) != 0)
			  {
				  $duree = 'Il ya '.(floor($nbjour/(30))).'Mois'.($reste - (floor($reste/30)*30)).'J';
			  }else{
				  $duree = 'Il ya '.($reste - (floor($reste/30)*30)).'J';
			  }
		      
		  }else{
			  $courantyear = date('Y');
			  $duree = $courantyear - $age; 
		  }
		  }
	   }
	}
	return $duree;
	}
	
	/**
     * @ORM\PrePersist()
     */
    public function updatecommentaire()
	{
		$this->getCommentaireblog()->setNbmessage($this->getCommentaireblog()->getNbmessage() + 1);
	}
	
	/**
     * @ORM\PreRemove()
     */
    public function removecommentaire()
	{
		$this->getCommentaireblog()->setNbmessage($this->getCommentaireblog()->getNbmessage() - 1);
	}

    /**
     * Set commentaireblog
     *
     * @param \Produit\ServiceBundle\Entity\Commentaireblog $commentaireblog
     * @return Intervention
     */
    public function setCommentaireblog(\Produit\ServiceBundle\Entity\Commentaireblog $commentaireblog)
    {
        $this->commentaireblog = $commentaireblog;
		$commentaireblog->addIntervention($this);

        return $this;
    }

    /**
     * Get commentaireblog
     *
     * @return \Produit\ServiceBundle\Entity\Commentaireblog 
     */
    public function getCommentaireblog()
    {
        return $this->commentaireblog;
    }

    /**
     * Set user
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Intervention
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
}
