<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\DTO\TodoInput;
use App\Repository\TodoRepository;
use App\State\TodoPostProcessor;
use App\State\TodoUpdateProcessor;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TodoRepository::class),
    ApiResource(
        normalizationContext: ['groups' => ['todo:read']],
        denormalizationContext: ['groups' => ['todo:write']],
        paginationEnabled: false,
    ),
    GetCollection(),
    Get(),
    Post(
        input: TodoInput::class,
        processor: TodoPostProcessor::class,
    ),
    Put(
        input: TodoInput::class,
        processor: TodoUpdateProcessor::class,
    ),
]
class Todo {
  #[
      ApiProperty(identifier: true),
      ORM\Id,
      ORM\Column(type: 'string', unique: true),
      ORM\GeneratedValue(strategy: 'CUSTOM'),
      ORM\CustomIdGenerator(class: 'doctrine.uuid_generator'),
      Groups(['todo:read'])
  ]
  private ?int $id = NULL;

  #[
      ORM\Column(length: 255),
      Groups(['todo:read'])
  ]
  private ?string $text = NULL;

  #[
      ORM\Column,
      Groups(['todo:read'])
  ]
  private bool $done = false;

  #[
      Groups(['todo:read']),
      ORM\Column
  ]
  private ?\DateTimeImmutable $createdAt = NULL;

  #[ORM\Column(nullable: true)]
  private ?\DateTimeImmutable $updatedAt = NULL;

  public function __construct() {
    $this->createdAt = new \DateTimeImmutable();
  }

  public function getId(): ?int {
    return $this->id;
  }

  public function getText(): ?string {
    return $this->text;
  }

  public function setText(string $text): self {
    $this->text = $text;

    return $this;
  }

  public function isDone(): ?bool {
    return $this->done;
  }

  public function setDone(bool $done): self {
    $this->done = $done;

    return $this;
  }

  public function getCreatedAt(): ?\DateTimeImmutable {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTimeImmutable $createdAt): self {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function getUpdatedAt(): ?\DateTimeImmutable {
    return $this->updatedAt;
  }

  public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self {
    $this->updatedAt = $updatedAt;

    return $this;
  }
}
