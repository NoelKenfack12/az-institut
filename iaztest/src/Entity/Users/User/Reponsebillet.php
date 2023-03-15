<?php

namespace App\Entity\Users\User;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Repository\Users\User\ReponsebilletRepository;
use App\Entity\Users\User\User;
use App\Entity\Users\User\Billet;

/**
 * Reponsebillet
 *
 * @ORM\Table("reponsebillet")
 * @ORM\Entity(repositoryClass=ReponsebilletRepository::class)
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
     * @Taillemin(valeur=2, message="Le nom publique doit avoir au moins 2 caractères")
     * @Taillemax(valeur=1500, message="Le nom publique doit avoir au plus 1500 caractès")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=true)
    */
	private $user;
	
	/**
       * @ORM\ManyToOne(targetEntity=Billet::class, inversedBy="reponsebillets")
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
     * @return Reponsebillet
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
     * Set billet
     * @return Reponsebillet
     */
    public function setBillet(Billet $billet): self
    {
        $this->billet = $billet;
		$billet->addReponsebillet($this);

        return $this;
    }

    /**
     * Get billet
     */
    public function getBillet(): ?Billet
    {
        return $this->billet;
    }
}
