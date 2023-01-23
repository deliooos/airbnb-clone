<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Housing::class, inversedBy: 'equipment')]
    private Collection $housing;

    public function __construct()
    {
        $this->housing = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Housing>
     */
    public function getHousing(): Collection
    {
        return $this->housing;
    }

    public function addHousing(Housing $housing): self
    {
        if (!$this->housing->contains($housing)) {
            $this->housing->add($housing);
        }

        return $this;
    }

    public function removeHousing(Housing $housing): self
    {
        $this->housing->removeElement($housing);

        return $this;
    }
}
