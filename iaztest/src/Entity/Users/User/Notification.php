<?php

namespace App\Entity\Users\User;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToArrayTransformer;
use App\Repository\Users\User\NotificationRepository;
use App\Entity\Users\User\User;

/**
 * Notification
 *
 * @ORM\Table("notification")
 * @ORM\Entity(repositoryClass=NotificationRepository::class)
 ** @ORM\HasLifecycleCallbacks
 */
class Notification
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
     * @var string
     *
     * @ORM\Column(name="contenu", type="text",nullable=true)
     */
    private $contenu;
	
	/**
     * @var string
     *
     * @ORM\Column(name="titre", type="string",nullable=true)
     */
    private $titre;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="transaction", type="boolean")
     */
    private $transaction;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="lut", type="boolean")
     */
    private $lut;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="depot", type="integer")
     */
    private $depot;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="retrait", type="integer")
     */
    private $retrait;
	
	/**
     * @var bigint
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
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=true)
    */
	private $auteur;
	
	 /**
     * Constructor
     */
    public function __construct()
    {
        $this->notificationusers = new \Doctrine\Common\Collections\ArrayCollection();
		$this->date = new \Datetime();
		$this->transaction = false;
		$this->valide = false;
		$this->lut = false;
		$this->depot = 0;
		$this->retrait = 0;
		$this->timestamp = time();
    }
	
	public function numFacture()
	{
		$datetransform = new DateTimeToArrayTransformer();
		$dt = $datetransform->transform($this->getDate());
		return 'OP'.$dt['day'].''.$this->getId().''.$dt['month'].''.$dt['year'];
	}
	
	public function dateFacture()
	{
		$datetransform = new DateTimeToArrayTransformer();
		$dt = $datetransform->transform($this->getDate());
		return $dt['day'].'/'.$dt['month'].'/'.$dt['year'];
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
     * Set contenu
     *
     * @param string $contenu
     * @return Notification
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
     * Set user
     * @return Notification
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
     * Set titre
     *
     * @param string $titre
     * @return Notification
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
     * Set transaction
     *
     * @param boolean $transaction
     * @return Notification
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return boolean 
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     * @return Notification
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean 
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set lut
     *
     * @param boolean $lut
     * @return Notification
     */
    public function setLut($lut)
    {
        $this->lut = $lut;

        return $this;
    }

    /**
     * Get lut
     *
     * @return boolean 
     */
    public function getLut()
    {
        return $this->lut;
    }

    /**
     * Set depot
     *
     * @param integer $depot
     * @return Notification
     */
    public function setDepot($depot)
    {
        $this->depot = $depot;

        return $this;
    }

    /**
     * Get depot
     *
     * @return integer 
     */
    public function getDepot()
    {
        return $this->depot;
    }

    /**
     * Set retrait
     *
     * @param integer $retrait
     * @return Notification
     */
    public function setRetrait($retrait)
    {
        $this->retrait = $retrait;

        return $this;
    }

    /**
     * Get retrait
     *
     * @return integer 
     */
    public function getRetrait()
    {
        return $this->retrait;
    }

    /**
     * Set timestamp
     *
     * @param integer $timestamp
     * @return Notification
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
     * Set auteur
     * @return Notification
     */
    public function setAuteur(User $auteur = null): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     */
    public function getAuteur(): ?User
    {
        return $this->auteur;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Notification
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
	
	public function getUploadDir()
	{
	// On retourne le chemin relatif vers l'image pour un navigateur
	return 'bundles/users/user/facture/depot';
	}
	
	public function getUploadRootDir()
	{
	// On retourne le chemin relatif vers l'image pour notre codePHP
	return  __DIR__.'/../../../../web/'.$this->getUploadDir();
	}
	
	public function getWebPath()
	{
	return $this->getUploadDir().'/'.$this->numFacture().'.pdf';
	}
}
