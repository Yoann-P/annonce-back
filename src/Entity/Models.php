<?php

namespace App\Entity;

use App\Repository\ModelsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelsRepository::class)]
class Models
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?int $years = null;

    #[ORM\Column]
    private ?int $km = null;

    #[ORM\Column(length: 255)]
    private ?string $gearbox = null;

    #[ORM\Column(length: 255)]
    private ?string $nrj = null;

    #[ORM\Column(length: 255)]
    private ?string $fiscalpower = null;

    #[ORM\Column(length: 255)]
    private ?string $dinpower = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $illustration = null;

    #[ORM\ManyToOne(inversedBy: 'models')]
    private ?Brand $brand = null;

    /**
     * @var Collection<int, ImageUrl>
     */
    #[ORM\OneToMany(targetEntity: ImageUrl::class, mappedBy: 'models')]
    private Collection $imageUrls;

    public function __construct()
    {
        $this->imageUrls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getYears(): ?int
    {
        return $this->years;
    }

    public function setYears(int $years): static
    {
        $this->years = $years;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): static
    {
        $this->km = $km;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function setGearbox(string $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getNrj(): ?string
    {
        return $this->nrj;
    }

    public function setNrj(string $nrj): static
    {
        $this->nrj = $nrj;

        return $this;
    }

    public function getFiscalpower(): ?string
    {
        return $this->fiscalpower;
    }

    public function setFiscalpower(string $fiscalpower): static
    {
        $this->fiscalpower = $fiscalpower;

        return $this;
    }

    public function getDinpower(): ?string
    {
        return $this->dinpower;
    }

    public function setDinpower(string $dinpower): static
    {
        $this->dinpower = $dinpower;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): static
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection<int, ImageUrl>
     */
    public function getImageUrls(): Collection
    {
        return $this->imageUrls;
    }

    public function addImageUrl(ImageUrl $imageUrl): static
    {
        if (!$this->imageUrls->contains($imageUrl)) {
            $this->imageUrls->add($imageUrl);
            $imageUrl->setModels($this);
        }

        return $this;
    }

    public function removeImageUrl(ImageUrl $imageUrl): static
    {
        if ($this->imageUrls->removeElement($imageUrl)) {
            // set the owning side to null (unless already changed)
            if ($imageUrl->getModels() === $this) {
                $imageUrl->setModels(null);
            }
        }

        return $this;
    }
}
