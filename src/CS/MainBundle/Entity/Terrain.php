<?php

namespace CS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Terrain
 *
 * @ORM\Table(name="terrain")
 * @ORM\Entity(repositoryClass="CS\MainBundle\Repository\TerrainRepository")
 */
class Terrain
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
     * @ORM\Column(name="identifiant", type="string", length=255, nullable=true)
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="feuille_cadastrale", type="string", length=255, nullable=true)
     */
    private $feuilleCadastrale;

    /**
     * @var string
     *
     * @ORM\Column(name="parcelle_cadastrale", type="string", length=255, nullable=true)
     */
    private $parcelleCadastrale;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_cadastrale", type="string", length=255, nullable=true)
     */
    private $categorieCadastrale;

    /**
     * @var string
     *
     * @ORM\Column(name="superficie", type="string", length=255, nullable=true)
     */
    private $superficie;

    /**
     * @var string
     *
     * @ORM\Column(name="lot", type="string", length=255, nullable=true)
     */
    private $lot;

    /**
     * @var string
     *
     * @ORM\Column(name="no_parcelle", type="string", length=255, nullable=true)
     */
    private $noParcelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;


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
     * Set identifiant
     *
     * @param string $identifiant
     *
     * @return Terrain
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Get identifiant
     *
     * @return string
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Terrain
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Terrain
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
     * Set feuilleCadastrale
     *
     * @param string $feuilleCadastrale
     *
     * @return Terrain
     */
    public function setFeuilleCadastrale($feuilleCadastrale)
    {
        $this->feuilleCadastrale = $feuilleCadastrale;

        return $this;
    }

    /**
     * Get feuilleCadastrale
     *
     * @return string
     */
    public function getFeuilleCadastrale()
    {
        return $this->feuilleCadastrale;
    }

    /**
     * Set parcelleCadastrale
     *
     * @param string $parcelleCadastrale
     *
     * @return Terrain
     */
    public function setParcelleCadastrale($parcelleCadastrale)
    {
        $this->parcelleCadastrale = $parcelleCadastrale;

        return $this;
    }

    /**
     * Get parcelleCadastrale
     *
     * @return string
     */
    public function getParcelleCadastrale()
    {
        return $this->parcelleCadastrale;
    }

    /**
     * Set categorieCadastrale
     *
     * @param string $categorieCadastrale
     *
     * @return Terrain
     */
    public function setCategorieCadastrale($categorieCadastrale)
    {
        $this->categorieCadastrale = $categorieCadastrale;

        return $this;
    }

    /**
     * Get categorieCadastrale
     *
     * @return string
     */
    public function getCategorieCadastrale()
    {
        return $this->categorieCadastrale;
    }

    /**
     * Set superficie
     *
     * @param string $superficie
     *
     * @return Terrain
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return string
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set lot
     *
     * @param string $lot
     *
     * @return Terrain
     */
    public function setLot($lot)
    {
        $this->lot = $lot;

        return $this;
    }

    /**
     * Get lot
     *
     * @return string
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * Set noParcelle
     *
     * @param string $noParcelle
     *
     * @return Terrain
     */
    public function setNoParcelle($noParcelle)
    {
        $this->noParcelle = $noParcelle;

        return $this;
    }

    /**
     * Get noParcelle
     *
     * @return string
     */
    public function getNoParcelle()
    {
        return $this->noParcelle;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Terrain
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Terrain
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}

