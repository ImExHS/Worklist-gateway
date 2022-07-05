<?php

namespace App\Entity;

use App\Repository\WorklistRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorklistRepository::class)
 */
class Worklist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $current;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $provenance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $next_node;

    /**
     * @ORM\Column(type="boolean")
     */
    private $itsTheFinal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrent(): ?\DateTimeInterface
    {
        return $this->current;
    }

    public function setCurrent(\DateTimeInterface $current): self
    {
        $this->current = $current;

        return $this;
    }

    public function getProvenance(): ?string
    {
        return $this->provenance;
    }

    public function setProvenance(string $provenance): self
    {
        $this->provenance = $provenance;

        return $this;
    }

    public function getNextNode(): ?string
    {
        return $this->next_node;
    }

    public function setNextNode(string $next_node): self
    {
        $this->next_node = $next_node;

        return $this;
    }

    public function isItsTheFinal(): ?bool
    {
        return $this->itsTheFinal;
    }

    public function setItsTheFinal(bool $itsTheFinal): self
    {
        $this->itsTheFinal = $itsTheFinal;

        return $this;
    }
}
