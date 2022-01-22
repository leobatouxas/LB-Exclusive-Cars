<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2)]
    private $prix;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'smallint')]
    private $annee;

    #[ORM\Column(type: 'integer')]
    private $kilometrage;

    #[ORM\Column(type: 'string', length: 255)]
    private $couleur;

    #[ORM\Column(type: 'smallint')]
    private $puissanceFiscale;

    #[ORM\Column(type: 'smallint')]
    private $puissanceDin;

    #[ORM\Column(type: 'string', length: 255)]
    private $ville;

    #[ORM\Column(type: 'string', length: 255)]
    private $codePostal;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\Column(type: 'datetime')]
    private $dateAnnonce;

    #[ORM\Column(type: 'boolean')]
    private $enVente;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $slug;

    #[ORM\ManyToOne(targetEntity: Modele::class, inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    private $modele;

    #[ORM\ManyToOne(targetEntity: Carburant::class, inversedBy: 'vehicules')]
    private $carburant;

    #[ORM\ManyToOne(targetEntity: BoiteVitesse::class, inversedBy: 'vehicules')]
    private $boiteVitesse;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'vehicules')]
    private $type;

    #[ORM\ManyToOne(targetEntity: NbPorte::class, inversedBy: 'vehicules')]
    private $nbPorte;

    #[ORM\ManyToOne(targetEntity: CritAir::class, inversedBy: 'vehicules')]
    private $critAir;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Photo::class, orphanRemoval: true)]
    private $photos;

    #[ORM\ManyToOne(targetEntity: Garage::class, inversedBy: 'vehicules')]
    private $garage;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPuissanceFiscale(): ?int
    {
        return $this->puissanceFiscale;
    }

    public function setPuissanceFiscale(int $puissanceFiscale): self
    {
        $this->puissanceFiscale = $puissanceFiscale;

        return $this;
    }

    public function getPuissanceDin(): ?int
    {
        return $this->puissanceDin;
    }

    public function setPuissanceDin(int $puissanceDin): self
    {
        $this->puissanceDin = $puissanceDin;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateAnnonce(): ?\DateTimeInterface
    {
        return $this->dateAnnonce;
    }

    public function setDateAnnonce(\DateTimeInterface $dateAnnonce): self
    {
        $this->dateAnnonce = $dateAnnonce;

        return $this;
    }

    public function getEnVente(): ?bool
    {
        return $this->enVente;
    }

    public function setEnVente(bool $enVente): self
    {
        $this->enVente = $enVente;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCarburant(): ?Carburant
    {
        return $this->carburant;
    }

    public function setCarburant(?Carburant $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getBoiteVitesse(): ?BoiteVitesse
    {
        return $this->boiteVitesse;
    }

    public function setBoiteVitesse(?BoiteVitesse $boiteVitesse): self
    {
        $this->boiteVitesse = $boiteVitesse;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNbPorte(): ?NbPorte
    {
        return $this->nbPorte;
    }

    public function setNbPorte(?NbPorte $nbPorte): self
    {
        $this->nbPorte = $nbPorte;

        return $this;
    }

    public function getCritAir(): ?CritAir
    {
        return $this->critAir;
    }

    public function setCritAir(?CritAir $critAir): self
    {
        $this->critAir = $critAir;

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setVehicule($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getVehicule() === $this) {
                $photo->setVehicule(null);
            }
        }

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): self
    {
        $this->garage = $garage;

        return $this;
    }
}
