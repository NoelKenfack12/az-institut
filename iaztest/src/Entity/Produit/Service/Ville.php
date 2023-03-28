<?php

namespace App\Entity\Produit\Service;

use Doctrine\ORM\Mapping as ORM;
use App\Validator\Validatortext\Taillemin;
use App\Validator\Validatortext\Taillemax;
use App\Service\Servicetext\GeneralServicetext;
use App\Repository\Produit\Service\VilleRepository;
use App\Entity\Users\User\User;
use App\Entity\Produit\Produit\Coutlivraison;
use Doctrine\Common\Collections\Collection;

/**
 * Ville
 *
 * @ORM\Table("ville")
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
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
     * @ORM\Column(name="nom", type="string", length=255)
     * @Taillemin(valeur=3, message="Au moins 3 caractères")
     * @Taillemax(valeur=50, message="Au plus 50 caractès")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
       * @ORM\ManyToOne(targetEntity=User::class)
       * @ORM\JoinColumn(nullable=false)
    */
	private $user;
	
	/**
     * @ORM\OneToMany(targetEntity=Coutlivraison::class, mappedBy="ville")
     */
    private $coutlivraisons;
	
	// variable du service de normalisation des noms des pays.
	private $servicetext;
	
	public function __construct(GeneralServicetext $service)
	{
        $this->servicetext = $service;
        $this->date = new \Datetime();
        $this->coutlivraisons = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	public function setServicetext( GeneralServicetext $service)
    {
    $this->servicetext = $service;
    }
    public function getServicetext()
    {
    return $this->servicetext;
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
     * @return Ville
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
     * Set pays
     *
     * @param string $pays
     * @return Ville
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Ville
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
     * @return Ville
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
     * Add coutlivraisons
     * @return Ville
     */
    public function addCoutlivraison(Coutlivraison $coutlivraisons): self
    {
        $this->coutlivraisons[] = $coutlivraisons;

        return $this;
    }

    /**
     * Remove coutlivraisons
     */
    public function removeCoutlivraison(Coutlivraison $coutlivraisons)
    {
        $this->coutlivraisons->removeElement($coutlivraisons);
    }

    /**
     * Get coutlivraisons 
     */
    public function getCoutlivraisons(): ?Collection
    {
        return $this->coutlivraisons;
    }
}