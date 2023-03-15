<?php

namespace App\Entity\Produit\Service;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\Produit\Service\RessourcearticleRepository;
use App\Entity\Produit\Service\Service;
use App\Entity\Users\User\User;

/**
* Ressourcearticle
*
* @ORM\Table("ressourcearticle")
* @ORM\Entity(repositoryClass=RessourcearticleRepository::class)
**/
 
class Ressourcearticle
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
     * @ORM\Column(name="type", type="string", length=255)
    */
    private $type;
	
	/**
       * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="ressourcearticles")
       * @ORM\JoinColumn(nullable=false)
      */
	private $service;
	
	/**
       * @ORM\ManyToOne(targetEntity=Service::class)
       * @ORM\JoinColumn(nullable=false)
      */
	private $ressource;
	
	/**
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=false)
      */
	private $user;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer")
     */
    private $rang;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->rang = 1;
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
     * @return Ressourcearticle
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
     * Set service
     * @return Ressourcearticle
    */
	
    public function setService(Service $service): self
    {
        $this->service = $service;
		$service->addRessourcearticle($this);

        return $this;
    }

    /**
     * Get service
     */
    public function getService(): ?Service
    {
        return $this->service;
    }


    /**
     * Set rang
     *
     * @param integer $rang
     * @return Ressourcearticle
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
     * Set user
     * @return Ressourcearticle
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
     * Set ressource
     * @return Ressourcearticle
     */
    public function setRessource(Service $ressource): self
    {
        $this->ressource = $ressource;

        return $this;
    }

    /**
     * Get ressource
     */
    public function getRessource(): ?Service
    {
        return $this->ressource;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Ressourcearticle
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
}
