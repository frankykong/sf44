<?php

namespace App\Entity;

use App\Repository\CategoryRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @var Category|null
     * @Gedmo\TreeRoot
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     */
    private $root;

    /**
     * @var Category|null
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="children")
     */
    private $parent;

    /**
     * @var Category
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="parent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $children;

    /**
     * @var int|null
     *
     * @Gedmo\TreeLeft
     * @ORM\Column(type="integer")
     */
    private $lft;

    /**
     * @var int|null
     *
     * @Gedmo\TreeLevel
     * @ORM\Column(type="integer")
     */
    private $lvl;

    /**
     * @var int|null
     *
     * @Gedmo\TreeRight
     * @ORM\Column(type="integer")
     */
    private $rgt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="Category")
     */
    private $article;

    public function __construct()
    {
        $this->article = new ArrayCollection();
        //$this->childrens = new ArrayCollection();
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setChildren(Category $children): void
    {
        $this->children = $children;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(Category $parent = null): void
    {
        $this->parent = $parent;
    }

    public function getRoot()
    {
        return $this->root;
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
     * @return Collection|article[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->setCategory($this);
        }
        return $this;
    }


    public function removeArticle(Article $article): self
    {
        if ($this->article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getCategory() === $this) {
                $article->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }
}
