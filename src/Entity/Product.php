<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: ProductRepository::class)]

class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $productName = null;

    #[ORM\Column(length: 255)]
    private ?string $productDescription = null;

    #[ORM\Column]
    private ?int $productCount = null;

    #[ORM\Column]
    private ?float $productPrice = null;

    #[ORM\ManyToOne(inversedBy: 'productss')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'products')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $product_img = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $p_image_file = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->productDescription;
    }

    public function setProductDescription(string $productDescription): self
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    public function getProductCount(): ?int
    {
        return $this->productCount;
    }

    public function setProductCount(int $productCount): self
    {
        $this->productCount = $productCount;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->productPrice;
    }

    public function setProductPrice(float $productPrice): self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addProduct($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeProduct($this);
        }

        return $this;
    }

    public function getProductImg(): ?string
    {
        return $this->product_img;
    }
    /**
     * @param string|null $product_img
    */
    public function setProductImg(?string $product_img): self
    {
        $this->product_img = $product_img;

        return $this;
    }

    public function getPImageFile(): ?File
    {
        return $this->p_image_file;
    }
    /**
     * @param File|null $p_image_file
    */
    public function setPImageFile(?File $p_image_file=null): self
    {
        $this->p_image_file = $p_image_file;

        return $this;
    }
}