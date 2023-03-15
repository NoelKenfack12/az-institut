<?php

namespace App\Entity\Produit\Service;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Email;
use App\Validator\Validatortext\Siteweb;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Entity\Produit\Service\Service;
use App\Entity\Users\User\User;

/**
 * Commentaireblog
 *
 * @ORM\Table("commentaireblog")
 * @ORM\Entity(repositoryClass=CommentaireblogRepository::class)
 */

class Commentaireblog
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
     * @ORM\Column(name="nom", type="string", length=255,nullable=true)
     *@Taillemax(valeur=100, message="Au plus 100 caractès")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255,nullable=true)
     *@Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255,nullable=true)
     *@Siteweb()
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     *@Taillemax(valeur=500, message="Au plus 500 caractès")
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
     * @ORM\Column(name="timestamp", type="bigint")
     */
    private $timestamp;
	
	/**
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=true)
    */
	private $user;
	
	/**
       * @ORM\ManyToOne(targetEntity=Service::class,inversedBy="commentaireblogs")
       * @ORM\JoinColumn(nullable=false)
    */
	private $service;
	
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
     * Set nom
     *
     * @param string $nom
     * @return Commentaireblog
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
     * Set email
     *
     * @param string $email
     * @return Commentaireblog
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
     * Set url
     *
     * @param string $url
     * @return Commentaireblog
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Commentaireblog
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
     * @return Commentaireblog
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
     * @return Commentaireblog
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
     * Set user
     * @return Commentaireblog
     */
    public function setUser(User $user = null): self
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
     * Set service
     * @return Commentaireblog
     */
    public function setService(Service $service): self
    {
        $this->service = $service;
		$service->addCommentaireblog($this);

        return $this;
    }

    /**
     * Get service
     */
    public function getService(): ?Service
    {
        return $this->service;
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
}
