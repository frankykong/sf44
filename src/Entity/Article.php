<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ORM\EntityListeners({"App\Listeners\ArticleListener"})
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Attachment", mappedBy="article")
     */
    private $attachments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tagIds;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnailSmall;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnailBig;

    /**
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hits;

    /**
     * @var DateTimeInterface|null
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdTime;

    /**
     * @var DateTimeInterface|null
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updateTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="article")
     */
    private $category;

    public function __construct(?int $id)
    {
        if($id){
            $this->id =$id;
        }
        $this->attachments = new ArrayCollection();
    }

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

    public function getTagIds(): ?string
    {
        return $this->tagIds;
    }

    public function setTagIds(?string $tagIds): self
    {
        $this->tagIds = $tagIds;
        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getThumbnailSmall(): ?string
    {
        return $this->thumbnailSmall;
    }

    public function setThumbnailSmall(?string $thumbnailSmall): self
    {
        $this->thumbnailSmall = $thumbnailSmall;
        return $this;
    }

    public function getThumbnailBig(): ?string
    {
        return $this->thumbnailBig;
    }

    public function setThumbnailBig(?string $thumbnailBig): self
    {
        $this->thumbnailBig = $thumbnailBig;
        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getHits(): ?int
    {
        return $this->hits;
    }

    public function setHits(?int $hits): self
    {
        $this->hits = $hits;
        return $this;
    }

    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    public function setCreatedTime( $createdTime)
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    public function setUpdateTime( $updateTime)
    {
        $this->updateTime = $updateTime;
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
     * @return Collection|Attachment[]
     */
    public function getAttachments(): Collection
    {
        return $this->attachments;
    }

    public function addAttachment(Attachment $attachment): self
    {
        if (!$this->attachments->contains($attachment)) {
            $this->attachments[] = $attachment;
            $attachment->setArticle($this);
        }
        return $this;
    }

    public function removeAttachment(Attachment $attachment): self
    {
        if ($this->attachments->removeElement($attachment)) {
            // set the owning side to null (unless already changed)
            if ($attachment->getArticle() === $this) {
                $attachment->setArticle(null);
            }
        }
        return $this;
    }
}
