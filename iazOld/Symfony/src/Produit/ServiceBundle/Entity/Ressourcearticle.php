<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Ressourcearticle
*
* @ORM\Table("ressourcearticle")
* @ORM\Entity(repositoryClass="Produit\ServiceBundle\Entity\RessourcearticleRepository")
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
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Service", inversedBy="ressourcearticles")
       * @ORM\JoinColumn(nullable=false)
      */
	private $service;
	
	/**
       * @ORM\ManyToOne(targetEntity="Produit\ServiceBundle\Entity\Service")
       * @ORM\JoinColumn(nullable=false)
      */
	private $ressource;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
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
     *
     * @param \Produit\ServiceBundle\Entity\Service $service
     * @return Ressourcearticle
    */
	
    public function setService(\Produit\ServiceBundle\Entity\Service $service)
    {
        $this->service = $service;
		$service->addRessourcearticle($this);

        return $this;
    }

    /**
     * Get service
     *
     * @return \Produit\ServiceBundle\Entity\Service 
     */
    public function getService()
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
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Ressourcearticle
     */
    public function setUser(\Users\UserBundle\Entity\User $user)
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

    /**
     * Set ressource
     *
     * @param \Produit\ServiceBundle\Entity\Service $ressource
     * @return Ressourcearticle
     */
    public function setRessource(\Produit\ServiceBundle\Entity\Service $ressource)
    {
        $this->ressource = $ressource;

        return $this;
    }

    /**
     * Get ressource
     *
     * @return \Produit\ServiceBundle\Entity\Service 
     */
    public function getRessource()
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
