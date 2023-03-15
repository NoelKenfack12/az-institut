<?php

namespace Users\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\ValidatorBundle\Validatortext\Email;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use General\ValidatorBundle\Validatortext\Taillemin;
use General\ValidatorBundle\Validatortext\Taillemax;

/**
 * newsletter
 *
 * @ORM\Table("newsletter")
 * @ORM\Entity(repositoryClass="Users\UserBundle\Entity\NewsletterRepository")
  * @UniqueEntity(fields="email", message="Cette adresse existe déjà.")
 */
class Newsletter
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
     * @ORM\Column(name="nom", type="string", length=255,nullable=true)
     *@Taillemin(valeur=2, message="Au moins 2 caractères")
     *@Taillemax(valeur=200, message="Au plus 200 caractès")
     */
	private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255,unique=true)
     *@Email()
     */
    private $email;
	
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="lastemail", type="datetime")
     */
    private $lastemail;
	
	public function __construct()
	{
		$this->date = new \Datetime();
		$this->lastemail = new \Datetime();
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
     * @return newsletter
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
     * Set email
     *
     * @param string $email
     * @return newsletter
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
     * Set nom
     *
     * @param string $nom
     * @return Newsletter
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
     * Set lastemail
     *
     * @param \DateTime $lastemail
     * @return Newsletter
     */
    public function setLastemail($lastemail)
    {
        $this->lastemail = $lastemail;

        return $this;
    }

    /**
     * Get lastemail
     *
     * @return \DateTime 
     */
    public function getLastemail()
    {
        return $this->lastemail;
    }
}
