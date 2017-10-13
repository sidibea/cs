<?php

namespace CS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locations
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity(repositoryClass="CS\MainBundle\Repository\LocationsRepository")
 */
class Locations
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
     * Plusieurs biens peuvent appartenir à un propriétaire.
     * @ORM\ManyToOne(targetEntity="Bien", cascade={"remove", "persist"} )
     */
    private $biens;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="utilisation", type="string", length=255)
     */
    private $utilisation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut_du_bail", type="date")
     */
    private $debutDuBail;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin_du_bail", type="date")
     */
    private $finDuBail;

    /**
     * @var string
     *
     * @ORM\Column(name="paiement", type="decimal", precision=10, scale=2)
     */
    private $paiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_quittancement", type="datetime")
     */
    private $dateDeQuittancement;

    /**
     * @var string
     *
     * @ORM\Column(name="generation_de_paiement", type="text")
     */
    private $generationDePaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="loyerHc", type="decimal", precision=10, scale=2)
     */
    private $loyerHc;

    /**
     * @var string
     *
     * @ORM\Column(name="charges", type="decimal", precision=10, scale=2)
     */
    private $charges;

    /**
     * @var string
     *
     * @ORM\Column(name="frais_de_retard", type="decimal", precision=10, scale=2)
     */
    private $fraisDeRetard;

    /**
     * @var string
     *
     * @ORM\Column(name="depot_de_garanti", type="decimal", precision=10, scale=2)
     */
    private $depotDeGaranti;

    /**
     * @var string
     *
     * @ORM\Column(name="autres_depots", type="decimal", precision=10, scale=2)
     */
    private $autresDepots;

    /**
     * @var string
     *
     * @ORM\Column(name="locataire", type="string", length=255)
     */
    private $locataire;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_travaux_proprietaire", type="decimal", precision=10, scale=2)
     */
    private $montantTravauxProprietaire;

    /**
     * @var string
     *
     * @ORM\Column(name="description_travaux_proprietaire", type="text")
     */
    private $descriptionTravauxProprietaire;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_travaux_locataire", type="decimal", precision=10, scale=2)
     */
    private $montantTravauxLocataire;

    /**
     * @var string
     *
     * @ORM\Column(name="description_travaux_locataire", type="text", nullable=true)
     */
    private $descriptionTravauxLocataire;

    /**
     * @var string
     *
     * @ORM\Column(name="condition_particuliere", type="text", nullable=true)
     */
    private $conditionParticuliere;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_pour_la_quittance", type="text")
     */
    private $textePourLaQuittance;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_pour_lavis_echeance", type="text")
     */
    private $textePourLavisEcheance;

    /**
     * @var string
     *
     * @ORM\Column(name="loyerHc_premiere_quittance", type="decimal", precision=10, scale=2)
     */
    private $loyerHcPremiereQuittance;

    /**
     * @var string
     *
     * @ORM\Column(name="charges_premiere_quittance", type="decimal", precision=10, scale=2)
     */
    private $chargesPremiereQuittance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_fin_du_mois", type="datetime")
     */
    private $dateDeFinDuMois;


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
     * @return \DateTime
     */
    public function getFinDuBail()
    {
        return $this->finDuBail;
    }

    /**
     * @param \DateTime $finDuBail
     */
    public function setFinDuBail($finDuBail)
    {
        $this->finDuBail = $finDuBail;
    }



    /**
     * Set biens
     *
     * @param string $biens
     *
     * @return Locations
     */
    public function setBiens($biens)
    {
        $this->biens = $biens;

        return $this;
    }

    /**
     * Get biens
     *
     * @return string
     */
    public function getBiens()
    {
        return $this->biens;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Locations
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
     * Set utilisation
     *
     * @param string $utilisation
     *
     * @return Locations
     */
    public function setUtilisation($utilisation)
    {
        $this->utilisation = $utilisation;

        return $this;
    }

    /**
     * Get utilisation
     *
     * @return string
     */
    public function getUtilisation()
    {
        return $this->utilisation;
    }

    /**
     * Set debutDuBail
     *
     * @param \DateTime $debutDuBail
     *
     * @return Locations
     */
    public function setDebutDuBail($debutDuBail)
    {
        $this->debutDuBail = $debutDuBail;

        return $this;
    }

    /**
     * Get debutDuBail
     *
     * @return \DateTime
     */
    public function getDebutDuBail()
    {
        return $this->debutDuBail;
    }

    /**
     * Set paiement
     *
     * @param string $paiement
     *
     * @return Locations
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * Get paiement
     *
     * @return string
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set dateDeQuittancement
     *
     * @param \DateTime $dateDeQuittancement
     *
     * @return Locations
     */
    public function setDateDeQuittancement($dateDeQuittancement)
    {
        $this->dateDeQuittancement = $dateDeQuittancement;

        return $this;
    }

    /**
     * Get dateDeQuittancement
     *
     * @return \DateTime
     */
    public function getDateDeQuittancement()
    {
        return $this->dateDeQuittancement;
    }

    /**
     * Set generationDePaiement
     *
     * @param string $generationDePaiement
     *
     * @return Locations
     */
    public function setGenerationDePaiement($generationDePaiement)
    {
        $this->generationDePaiement = $generationDePaiement;

        return $this;
    }

    /**
     * Get generationDePaiement
     *
     * @return string
     */
    public function getGenerationDePaiement()
    {
        return $this->generationDePaiement;
    }

    /**
     * Set loyerHc
     *
     * @param string $loyerHc
     *
     * @return Locations
     */
    public function setLoyerHc($loyerHc)
    {
        $this->loyerHc = $loyerHc;

        return $this;
    }

    /**
     * Get loyerHc
     *
     * @return string
     */
    public function getLoyerHc()
    {
        return $this->loyerHc;
    }

    /**
     * Set charges
     *
     * @param string $charges
     *
     * @return Locations
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Get charges
     *
     * @return string
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * Set fraisDeRetard
     *
     * @param string $fraisDeRetard
     *
     * @return Locations
     */
    public function setFraisDeRetard($fraisDeRetard)
    {
        $this->fraisDeRetard = $fraisDeRetard;

        return $this;
    }

    /**
     * Get fraisDeRetard
     *
     * @return string
     */
    public function getFraisDeRetard()
    {
        return $this->fraisDeRetard;
    }

    /**
     * Set depotDeGaranti
     *
     * @param string $depotDeGaranti
     *
     * @return Locations
     */
    public function setDepotDeGaranti($depotDeGaranti)
    {
        $this->depotDeGaranti = $depotDeGaranti;

        return $this;
    }

    /**
     * Get depotDeGaranti
     *
     * @return string
     */
    public function getDepotDeGaranti()
    {
        return $this->depotDeGaranti;
    }

    /**
     * Set autresDepots
     *
     * @param string $autresDepots
     *
     * @return Locations
     */
    public function setAutresDepots($autresDepots)
    {
        $this->autresDepots = $autresDepots;

        return $this;
    }

    /**
     * Get autresDepots
     *
     * @return string
     */
    public function getAutresDepots()
    {
        return $this->autresDepots;
    }

    /**
     * Set locataire
     *
     * @param string $locataire
     *
     * @return Locations
     */
    public function setLocataire($locataire)
    {
        $this->locataire = $locataire;

        return $this;
    }

    /**
     * Get locataire
     *
     * @return string
     */
    public function getLocataire()
    {
        return $this->locataire;
    }

    /**
     * Set montantTravauxProprietaire
     *
     * @param string $montantTravauxProprietaire
     *
     * @return Locations
     */
    public function setMontantTravauxProprietaire($montantTravauxProprietaire)
    {
        $this->montantTravauxProprietaire = $montantTravauxProprietaire;

        return $this;
    }

    /**
     * Get montantTravauxProprietaire
     *
     * @return string
     */
    public function getMontantTravauxProprietaire()
    {
        return $this->montantTravauxProprietaire;
    }

    /**
     * Set descriptionTravauxProprietaire
     *
     * @param string $descriptionTravauxProprietaire
     *
     * @return Locations
     */
    public function setDescriptionTravauxProprietaire($descriptionTravauxProprietaire)
    {
        $this->descriptionTravauxProprietaire = $descriptionTravauxProprietaire;

        return $this;
    }

    /**
     * Get descriptionTravauxProprietaire
     *
     * @return string
     */
    public function getDescriptionTravauxProprietaire()
    {
        return $this->descriptionTravauxProprietaire;
    }

    /**
     * Set montantTravauxLocataire
     *
     * @param string $montantTravauxLocataire
     *
     * @return Locations
     */
    public function setMontantTravauxLocataire($montantTravauxLocataire)
    {
        $this->montantTravauxLocataire = $montantTravauxLocataire;

        return $this;
    }

    /**
     * Get montantTravauxLocataire
     *
     * @return string
     */
    public function getMontantTravauxLocataire()
    {
        return $this->montantTravauxLocataire;
    }

    /**
     * Set descriptionTravauxLocataire
     *
     * @param string $descriptionTravauxLocataire
     *
     * @return Locations
     */
    public function setDescriptionTravauxLocataire($descriptionTravauxLocataire)
    {
        $this->descriptionTravauxLocataire = $descriptionTravauxLocataire;

        return $this;
    }

    /**
     * Get descriptionTravauxLocataire
     *
     * @return string
     */
    public function getDescriptionTravauxLocataire()
    {
        return $this->descriptionTravauxLocataire;
    }

    /**
     * Set conditionParticuliere
     *
     * @param string $conditionParticuliere
     *
     * @return Locations
     */
    public function setConditionParticuliere($conditionParticuliere)
    {
        $this->conditionParticuliere = $conditionParticuliere;

        return $this;
    }

    /**
     * Get conditionParticuliere
     *
     * @return string
     */
    public function getConditionParticuliere()
    {
        return $this->conditionParticuliere;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Locations
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set textePourLaQuittance
     *
     * @param string $textePourLaQuittance
     *
     * @return Locations
     */
    public function setTextePourLaQuittance($textePourLaQuittance)
    {
        $this->textePourLaQuittance = $textePourLaQuittance;

        return $this;
    }

    /**
     * Get textePourLaQuittance
     *
     * @return string
     */
    public function getTextePourLaQuittance()
    {
        return $this->textePourLaQuittance;
    }

    /**
     * Set textePourLavisEcheance
     *
     * @param string $textePourLavisEcheance
     *
     * @return Locations
     */
    public function setTextePourLavisEcheance($textePourLavisEcheance)
    {
        $this->textePourLavisEcheance = $textePourLavisEcheance;

        return $this;
    }

    /**
     * Get textePourLavisEcheance
     *
     * @return string
     */
    public function getTextePourLavisEcheance()
    {
        return $this->textePourLavisEcheance;
    }

    /**
     * Set loyerHcPremiereQuittance
     *
     * @param string $loyerHcPremiereQuittance
     *
     * @return Locations
     */
    public function setLoyerHcPremiereQuittance($loyerHcPremiereQuittance)
    {
        $this->loyerHcPremiereQuittance = $loyerHcPremiereQuittance;

        return $this;
    }

    /**
     * Get loyerHcPremiereQuittance
     *
     * @return string
     */
    public function getLoyerHcPremiereQuittance()
    {
        return $this->loyerHcPremiereQuittance;
    }

    /**
     * Set chargesPremiereQuittance
     *
     * @param string $chargesPremiereQuittance
     *
     * @return Locations
     */
    public function setChargesPremiereQuittance($chargesPremiereQuittance)
    {
        $this->chargesPremiereQuittance = $chargesPremiereQuittance;

        return $this;
    }

    /**
     * Get chargesPremiereQuittance
     *
     * @return string
     */
    public function getChargesPremiereQuittance()
    {
        return $this->chargesPremiereQuittance;
    }

    /**
     * Set dateDeFinDuMois
     *
     * @param \DateTime $dateDeFinDuMois
     *
     * @return Locations
     */
    public function setDateDeFinDuMois($dateDeFinDuMois)
    {
        $this->dateDeFinDuMois = $dateDeFinDuMois;

        return $this;
    }

    /**
     * Get dateDeFinDuMois
     *
     * @return \DateTime
     */
    public function getDateDeFinDuMois()
    {
        return $this->dateDeFinDuMois;
    }
}

