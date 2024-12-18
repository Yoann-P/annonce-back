<?php

namespace App\Entity;

use App\Repository\ImageUrlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageUrlRepository::class)]
class ImageUrl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\ManyToOne(inversedBy: 'imageUrls')]
    private ?Models $models = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getModels(): ?Models
    {
        return $this->models;
    }

    public function setModels(?Models $models): static
    {
        $this->models = $models;

        return $this;
    }
}
