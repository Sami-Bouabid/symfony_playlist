<?php

namespace App\Entity;

use App\Repository\SongRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SongRepository::class)]
class Song
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[Assert\NotBlank(
        message: "The song's title is required"
    )]
    #[Assert\Length(
        max: 255,
        maxMessage: "The song's title cannot be longer than {{ limit }} characters",
    )]
    #[ORM\Column(length: 255)]
    private ?string $title = null;

        

    #[Assert\NotBlank(
        message: "Artists name are required"
    )]
    #[Assert\Length(
        max: 255,
        maxMessage: "Artists name cannot be longer than {{ limit }} characters",
    )]
    #[ORM\Column(length: 255)]
    private ?string $artists = null;



    #[Assert\Range(
        min: 0,
        max: 5,
        notInRangeMessage: 'Score must be between {{ min }} and {{ max }}',
    )]    
    #[ORM\Column(nullable: true)]
    private ?float $score = null;



    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getArtists(): ?string
    {
        return $this->artists;
    }

    public function setArtists(string $artists): self
    {
        $this->artists = $artists;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
