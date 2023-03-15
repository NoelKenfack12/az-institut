<?php

namespace Users\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

/**
 * Reponsebillet
 *
* @ORM\Table("reponsebillet")
 * @ORM\Entity(repositoryClass="Users\UserBundle\Entity\ReponsebilletRepository")
 */
 
class Reponsebillet
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
     * @ORM\Column(name="description", type="text")
     *@Taillemin(valeur=2, message="Le nom publique doit avoir au moins 2 caractères")
     *@Taillemax(valeur=1500, message="Le nom publique doit avoir au plus 1500 caractès")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\User")
       * @ORM\JoinColumn(nullable=true)
        */
	private $user;
	
	/**
       * @ORM\ManyToOne(targetEntity="Users\UserBundle\Entity\Billet", inversedBy="reponsebillets")
       * @ORM\JoinColumn(nullable=false)
        */
	private $billet;
	
	public function __construct()
	{
		$this->date = new \Datetime();
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
     * Set description
     *
     * @param string $description
     * @return Reponsebillet
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
     * @return Reponsebillet
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
     * Set user
     *
     * @param \Users\UserBundle\Entity\User $user
     * @return Reponsebillet
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

    /**
     * Set billet
     *
     * @param \Users\UserBundle\Entity\Billet $billet
     * @return Reponsebillet
     */
    public function setBillet(\Users\UserBundle\Entity\Billet $billet)
    {
        $this->billet = $billet;
		$billet->addReponsebillet($this);

        return $this;
    }

    /**
     * Get billet
     *
     * @return \Users\UserBundle\Entity\Billet 
     */
    public function getBillet()
    {
        return $this->billet;
    }
}
