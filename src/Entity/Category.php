<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $categoryType = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Product::class)]
    private Collection $productss;

    public function __construct()
    {
        $this->productss = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryType(): ?string
    {
        return $this->categoryType;
    }

    public function setCategoryType(string $categoryType): self
    {
        $this->categoryType = $categoryType;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductss(): Collection
    {
        return $this->productss;
    }

    public function addProductss(Product $productss): self
    {
        if (!$this->productss->contains($productss)) {
            $this->productss->add($productss);
            $productss->setCategory($this);
        }

        return $this;
    }

    public function removeProductss(Product $productss): self
    {
        if ($this->productss->removeElement($productss)) {
            // set the owning side to null (unless already changed)
            if ($productss->getCategory() === $this) {
                $productss->setCategory(null);
            }
        }

        return $this;
    }    
    public function __toString() {
        return $this->categoryType;
    }
}