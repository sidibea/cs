<?php

namespace CS\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Immeubles
 *
 * @ORM\Table(name="immeubles")
 * @ORM\Entity(repositoryClass="CS\MainBundle\Repository\ImmeublesRepository")
 */
class Immeubles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToMany(targetEntity="CS\MainBundle\Entity\Bien", cascade={"persist", "remove"})
     */
    private $biens;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="date")
     */
    private $updatedAt;


    public function __construct()
    {
        $this->biens = new ArrayCollection();
    }

    public function addBien(Bien $bien)
    {
        // Ici, on utilise l'ArrayCollection vraiment comme un tableau
        $this->biens[] = $bien;

        return $this;
    }
    public function removeBien(Bien $bien)
    {
        // Ici on utilise une méthode de l'ArrayCollection, pour supprimer  le bien en argument
        $this->biens->removeElement($bien);
    }

    // Notez le pluriel, on récupère une liste de biens ici !
    public function getBiens()
    {
        return $this->biens;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }



    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Immeubles
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Immeubles
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
     * Set biens
     *
     * @param string $biens
     *
     * @return Immeubles
     */
    public function setBiens($biens)
    {
        $this->biens = $biens;

        return $this;
    }

}

