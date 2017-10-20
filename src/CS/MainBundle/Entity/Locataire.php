<?php

namespace CS\MainBundle\Entity;

use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Locataire
 *
 * @ORM\Table(name="locataire")
 * @ORM\Entity(repositoryClass="CS\MainBundle\Repository\LocataireRepository")
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 */
class Locataire
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
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=255)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="string", length=255, nullable=true)
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lieu_naissance", type="date", nullable=true)
     */
    private $lieuDeNaissance;

    /**
     * @Assert\Image(
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"},
     *     maxWidth=1000,
     *     maxHeight=1000
     * )
     * @Vich\UploadableField(mapping="locataire_image", fileNameProperty="photo")
     * @var [type]
     */
    private $photoFile;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255, nullable=true)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255, nullable=true)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="no_tva", type="string", length=255, nullable=true)
     */
    private $noTva;

    /**
     * @var string
     *
     * @ORM\Column(name="no_nina", type="string", length=255, nullable=true)
     */
    private $noNina;

    /**
     * @var string
     *
     * @ORM\Column(name="profession_exercee", type="string", length=255, nullable=true)
     */
    private $professionExercee;

    /**
     * @var string
     *
     * @ORM\Column(name="profession_locataire", type="string", length=255, nullable=true)
     */
    private $professionLocataire;

    /**
     * @var string
     *
     * @ORM\Column(name="revenus", type="string", length=255, nullable=true)
     */
    private $revenus;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_profession", type="string", length=255, nullable=true)
     */
    private $situationProfession;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_professionnel", type="text", nullable=true)
     */
    private $adresseProfessionnel;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_professionnelle", type="string", length=255, nullable=true)
     */
    private $villeProfessionnelle;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_professionel", type="string", length=255, nullable=true)
     */
    private $telephoneProfessionel;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="code_banque", type="string", length=255, nullable=true)
     */
    private $codeBanque;

    /**
     * @var string
     *
     * @ORM\Column(name="code_guichet", type="string", length=255, nullable=true)
     */
    private $codeGuichet;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_compte", type="string", length=255, nullable=true)
     */
    private $numeroCompte;

    

    /**
     * @var string
     *
     * @ORM\Column(name="cle_rib", type="string", length=255, nullable=true)
     */
    private $cleRib;

    /**
     * @var string
     *
     * @ORM\Column(name="banque", type="string", length=255, nullable=true)
     */
    private $banque;

    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=255, nullable=true)
     */
    private $iban;

    /**
     * @var string
     *
     * @ORM\Column(name="swift", type="string", length=255, nullable=true)
     */
    private $swift;

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
     * @ORM\ManyToMany(targetEntity="CS\MainBundle\Entity\Garants", cascade={"persist", "remove"})
     */
    private $garants;

    public function __construct()
    {
        $this->garants = new ArrayCollection();
    }

    public function getFullName(){

        return $this->prenom." ".$this->nom;
    }


    /**
     * @return mixed
     */
    public function getPhotoFile()
    {
        return $this->photoFile;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return \DateTime
     */
    public function getLieuDeNaissance()
    {
        return $this->lieuDeNaissance;
    }

    /**
     * @param \DateTime $lieuDeNaissance
     */
    public function setLieuDeNaissance($lieuDeNaissance)
    {
        $this->lieuDeNaissance = $lieuDeNaissance;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }





    /**
     * Sets the value of profile_picture_file.
     *
     * @return self
     */
    public function setPhotoFile(File $photoFile)
    {
        $this->photoFile = $photoFile;

        // Only change the updated af if the file is really uploaded to avoid database updates.
        // This is needed when the file should be set when loading the entity.
        if ($this->photoFile instanceof UploadedFile) {
            $this->setUpdatedAt(new Carbon());
        }

        return $this;
    }

    public function addGarant(Garants $garant)
    {  // Ici, on utilise l'ArrayCollection vraiment comme un tableau
        $this->garants[] = $garant;

        return $this;
    }
    public function removeGarant(Garants $garant)

    {
        // Ici on utilise une méthode de l'ArrayCollection, pour supprimer  le bien en argument
        $this->garants->removeElement($garant);
    }

    // Notez le pluriel, on récupère une liste de biens ici !
    public function getGarants()
    {
        return $this->garants;
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
     * Set type
     *
     * @param string $type
     *
     * @return Locataire
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
     * Set civilite
     *
     * @param string $civilite
     *
     * @return Locataire
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Locataire
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Locataire
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
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Locataire
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Locataire
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
     * Set fax
     *
     * @param string $fax
     *
     * @return Locataire
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Locataire
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Locataire
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
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Locataire
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Locataire
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Locataire
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
     * Set societe
     *
     * @param string $societe
     *
     * @return Locataire
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set noTva
     *
     * @param string $noTva
     *
     * @return Locataire
     */
    public function setNoTva($noTva)
    {
        $this->noTva = $noTva;

        return $this;
    }

    /**
     * Get noTva
     *
     * @return string
     */
    public function getNoTva()
    {
        return $this->noTva;
    }

    /**
     * Set noNina
     *
     * @param string $noNina
     *
     * @return Locataire
     */
    public function setNoNina($noNina)
    {
        $this->noNina = $noNina;

        return $this;
    }

    /**
     * Get noNina
     *
     * @return string
     */
    public function getNoNina()
    {
        return $this->noNina;
    }

    /**
     * Set professionExercee
     *
     * @param string $professionExercee
     *
     * @return Locataire
     */
    public function setProfessionExercee($professionExercee)
    {
        $this->professionExercee = $professionExercee;

        return $this;
    }

    /**
     * Get professionExercee
     *
     * @return string
     */
    public function getProfessionExercee()
    {
        return $this->professionExercee;
    }

    /**
     * Set professionLocataire
     *
     * @param string $professionLocataire
     *
     * @return Locataire
     */
    public function setProfessionLocataire($professionLocataire)
    {
        $this->professionLocataire = $professionLocataire;

        return $this;
    }

    /**
     * Get professionLocataire
     *
     * @return string
     */
    public function getProfessionLocataire()
    {
        return $this->professionLocataire;
    }

    /**
     * Set revenus
     *
     * @param string $revenus
     *
     * @return Locataire
     */
    public function setRevenus($revenus)
    {
        $this->revenus = $revenus;

        return $this;
    }

    /**
     * Get revenus
     *
     * @return string
     */
    public function getRevenus()
    {
        return $this->revenus;
    }

    /**
     * Set situationProfession
     *
     * @param string $situationProfession
     *
     * @return Locataire
     */
    public function setSituationProfession($situationProfession)
    {
        $this->situationProfession = $situationProfession;

        return $this;
    }

    /**
     * Get situationProfession
     *
     * @return string
     */
    public function getSituationProfession()
    {
        return $this->situationProfession;
    }

    /**
     * Set adresseProfessionnel
     *
     * @param string $adresseProfessionnel
     *
     * @return Locataire
     */
    public function setAdresseProfessionnel($adresseProfessionnel)
    {
        $this->adresseProfessionnel = $adresseProfessionnel;

        return $this;
    }

    /**
     * Get adresseProfessionnel
     *
     * @return string
     */
    public function getAdresseProfessionnel()
    {
        return $this->adresseProfessionnel;
    }

    /**
     * Set villeProfessionnelle
     *
     * @param string $villeProfessionnelle
     *
     * @return Locataire
     */
    public function setVilleProfessionnelle($villeProfessionnelle)
    {
        $this->villeProfessionnelle = $villeProfessionnelle;

        return $this;
    }

    /**
     * Get villeProfessionnelle
     *
     * @return string
     */
    public function getVilleProfessionnelle()
    {
        return $this->villeProfessionnelle;
    }

    /**
     * Set telephoneProfessionel
     *
     * @param string $telephoneProfessionel
     *
     * @return Locataire
     */
    public function setTelephoneProfessionel($telephoneProfessionel)
    {
        $this->telephoneProfessionel = $telephoneProfessionel;

        return $this;
    }

    /**
     * Get telephoneProfessionel
     *
     * @return string
     */
    public function getTelephoneProfessionel()
    {
        return $this->telephoneProfessionel;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Locataire
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set codeBanque
     *
     * @param string $codeBanque
     *
     * @return Locataire
     */
    public function setCodeBanque($codeBanque)
    {
        $this->codeBanque = $codeBanque;

        return $this;
    }

    /**
     * Get codeBanque
     *
     * @return string
     */
    public function getCodeBanque()
    {
        return $this->codeBanque;
    }

    /**
     * Set codeGuichet
     *
     * @param string $codeGuichet
     *
     * @return Locataire
     */
    public function setCodeGuichet($codeGuichet)
    {
        $this->codeGuichet = $codeGuichet;

        return $this;
    }

    /**
     * Get codeGuichet
     *
     * @return string
     */
    public function getCodeGuichet()
    {
        return $this->codeGuichet;
    }

    /**
     * Set numeroCompte
     *
     * @param string $numeroCompte
     *
     * @return Locataire
     */
    public function setNumeroCompte($numeroCompte)
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    /**
     * Get numeroCompte
     *
     * @return string
     */
    public function getNumeroCompte()
    {
        return $this->numeroCompte;
    }

    /**
     * Set cleRib
     *
     * @param string $cleRib
     *
     * @return Locataire
     */
    public function setCleRib($cleRib)
    {
        $this->cleRib = $cleRib;

        return $this;
    }

    /**
     * Get cleRib
     *
     * @return string
     */
    public function getCleRib()
    {
        return $this->cleRib;
    }

    /**
     * Set banque
     *
     * @param string $banque
     *
     * @return Locataire
     */
    public function setBanque($banque)
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * Get banque
     *
     * @return string
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * Set iban
     *
     * @param string $iban
     *
     * @return Locataire
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set swift
     *
     * @param string $swift
     *
     * @return Locataire
     */
    public function setSwift($swift)
    {
        $this->swift = $swift;

        return $this;
    }

    /**
     * Get swift
     *
     * @return string
     */
    public function getSwift()
    {
        return $this->swift;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Locataire
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
     * @return Locataire
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

