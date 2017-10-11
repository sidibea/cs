<?php

namespace CS\MainBundle\Entity;

use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Proprietaire
 *
 * @ORM\Table(name="proprietaire")
 * @ORM\Entity(repositoryClass="CS\MainBundle\Repository\ProprietaireRepository")
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 */
class Proprietaire
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
     * Un propriéraire peut posseder  plusieurs biens.
     * @ORM\OneToMany(targetEntity="Bien", cascade = {"persist", "remove"}, fetch="LAZY", mappedBy="proprietaire")
     */
    private $biens;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", nullable=true, length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="Civilite", type="string", length=255)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_naissance", type="datetime", length=255)
     */
    private $dateDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_de_naissance", type="string", length=255)
     */
    private $lieuDeNaissance;

    /**
     * @Assert\Image(
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"},
     *     maxWidth=250,
     *     maxHeight=250
     * )
     * @Vich\UploadableField(mapping="photo_image", fileNameProperty="photo")
     * @var [type]
     */
    private $photoFile;

    /**
     * @Assert\Image(
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"},
     *     maxWidth=250,
     *     maxHeight=250
     * )
     * @Vich\UploadableField(mapping="logo_image", fileNameProperty="logo")
     * @var [type]
     */
    private $logoFile;


    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true, unique=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true, unique=true)
     */
    private $email;





    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, unique=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="site_web", type="string", length=255, nullable=true)
     */
    private $siteWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255, nullable=true)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="no_nif", type="string", length=255, nullable=true)
     */
    private $noNif;

    /**
     * @var string
     *
     * @ORM\Column(name="capital", type="string", length=255, nullable=true)
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="no_nina", type="string", length=255, nullable=true)
     */
    private $noNina;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="banque", type="string", length=255, nullable=true)
     */
    private $banque;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_banque", nullable=true, type="text")
     */
    private $adresseBanque;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_banque", nullable=true, type="text")
     */
    private $villeBanque;

    /**
     * @var string
     *
     * @ORM\Column(name="pays_banque", nullable=true, type="text")
     */
    private $paysBanque;

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
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
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
     * @return mixed
     */
    public function getPhotoFile()
    {
        return $this->photoFile;
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

    /**
     * Sets the value of profile_picture_file.
     *
     * @return self
     */
    public function setLogoFile(File $logoFile)
    {
        $this->logoFile = $logoFile;

        // Only change the updated af if the file is really uploaded to avoid database updates.
        // This is needed when the file should be set when loading the entity.
        if ($this->logoFile instanceof UploadedFile) {
            $this->setUpdatedAt(new Carbon());
        }

        return $this;
    }

    public function getLogoFile()
    {
        return $this->logoFile;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFullName(){
        return $this->prenom." ".$this->nom;
    }







    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new Carbon();
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updatedAt = new Carbon();
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Proprietaire
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     *
     * @return Proprietaire
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

    public function __construct()
    {
        $this->biens = new ArrayCollection();
    }

    public function setBiens(Bien $biens){
        //dump($voyages); exit;

        foreach($biens as $bien)
            // dump($voyage); exit;
            $this->addBiens($bien);

        return $this;


    }

    public function addBiens(Bien $bien)
    {
        $this->biens[] = $bien;

        // On lie l'annonce à la candidature
        $bien->setProprietaire($this);

        return $this;
    }



    public function removeBiens(Bien $biens)
    {
        $this->biens->removeElement($biens);
    }

    public function getBiens()
    {
        return $this->biens;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Proprietaire
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
     * @return Proprietaire
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
     * Set dateDeNaissance
     *
     * @param string $dateDeNaissance
     *
     * @return Proprietaire
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    /**
     * Get dateDeNaissance
     *
     * @return string
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * Set lieuDeNaissance
     *
     * @param string $lieuDeNaissance
     *
     * @return Proprietaire
     */
    public function setLieuDeNaissance($lieuDeNaissance)
    {
        $this->lieuDeNaissance = $lieuDeNaissance;

        return $this;
    }

    /**
     * Get lieuDeNaissance
     *
     * @return string
     */
    public function getLieuDeNaissance()
    {
        return $this->lieuDeNaissance;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Proprietaire
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Proprietaire
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
     * Set ville
     *
     * @param string $ville
     *
     * @return Proprietaire
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
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Proprietaire
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
     * @return Proprietaire
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
     * Set fax
     *
     * @param string $fax
     *
     * @return Proprietaire
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
     * @return Proprietaire
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
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return Proprietaire
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Proprietaire
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
     * Set societe
     *
     * @param string $societe
     *
     * @return Proprietaire
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
     * Set noNif
     *
     * @param string $noNif
     *
     * @return Proprietaire
     */
    public function setNoNif($noNif)
    {
        $this->noNif = $noNif;

        return $this;
    }

    /**
     * Get noNif
     *
     * @return string
     */
    public function getNoNif()
    {
        return $this->noNif;
    }

    /**
     * Set capital
     *
     * @param string $capital
     *
     * @return Proprietaire
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set noNina
     *
     * @param string $noNina
     *
     * @return Proprietaire
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
     * Set logo
     *
     * @param string $logo
     *
     * @return Proprietaire
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set banque
     *
     * @param string $banque
     *
     * @return Proprietaire
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
     * Set adresseBanque
     *
     * @param string $adresseBanque
     *
     * @return Proprietaire
     */
    public function setAdresseBanque($adresseBanque)
    {
        $this->adresseBanque = $adresseBanque;

        return $this;
    }

    /**
     * Get adresseBanque
     *
     * @return string
     */
    public function getAdresseBanque()
    {
        return $this->adresseBanque;
    }

    /**
     * Set villeBanque
     *
     * @param string $villeBanque
     *
     * @return Proprietaire
     */
    public function setVilleBanque($villeBanque)
    {
        $this->villeBanque = $villeBanque;

        return $this;
    }

    /**
     * Get villeBanque
     *
     * @return string
     */
    public function getVilleBanque()
    {
        return $this->villeBanque;
    }

    /**
     * Set paysBanque
     *
     * @param string $paysBanque
     *
     * @return Proprietaire
     */
    public function setPaysBanque($paysBanque)
    {
        $this->paysBanque = $paysBanque;

        return $this;
    }

    /**
     * Get paysBanque
     *
     * @return string
     */
    public function getPaysBanque()
    {
        return $this->paysBanque;
    }

    /**
     * Set iban
     *
     * @param string $iban
     *
     * @return Proprietaire
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
     * @return Proprietaire
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
     * @return Proprietaire
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
     * @return Proprietaire
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

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}

