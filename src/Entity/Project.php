<?php

namespace App\Entity;
use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass=projectRepository::class)
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="userName", type="string", length=255)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="userTitle", type="string", length=255)
     */
    private $userTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="userSketch", type="string", length=255)
     */
    private $userSketch;

    /**
     * @var string
     *
     * @ORM\Column(name="userImg", type="string", length=255)
     */
    private $userImg;

    /**
     * @var string
     *
     * @ORM\Column(name="userContent", type="string", length=255)
     */
    private $userContent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="userTime", type="datetime")
     */
    private $userTime;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return Project
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userTitle
     *
     * @param string $userTitle
     *
     * @return Project
     */
    public function setUserTitle($userTitle)
    {
        $this->userTitle = $userTitle;

        return $this;
    }

    /**
     * Get userTitle
     *
     * @return string
     */
    public function getUserTitle()
    {
        return $this->userTitle;
    }

    /**
     * Set userSketch
     *
     * @param string $userSketch
     *
     * @return Project
     */
    public function setUserSketch($userSketch)
    {
        $this->userSketch = $userSketch;

        return $this;
    }

    /**
     * Get userSketch
     *
     * @return string
     */
    public function getUserSketch()
    {
        return $this->userSketch;
    }

    /**
     * Set userImg
     *
     * @param string $userImg
     *
     * @return Project
     */
    public function setUserImg($userImg)
    {
        $this->userImg = $userImg;

        return $this;
    }

    /**
     * Get userImg
     *
     * @return string
     */
    public function getUserImg()
    {
        return $this->userImg;
    }

    /**
     * Set userContent
     *
     * @param string $userContent
     *
     * @return Project
     */
    public function setUserContent($userContent)
    {
        $this->userContent = $userContent;

        return $this;
    }

    /**
     * Get userContent
     *
     * @return string
     */
    public function getUserContent()
    {
        return $this->userContent;
    }

    /**
     * Set userTime
     *
     * @param \DateTime $userTime
     *
     * @return Project
     */
    public function setUserTime($userTime)
    {
        $this->userTime = $userTime;

        return $this;
    }

    /**
     * Get userTime
     *
     * @return \DateTime
     */
    public function getUserTime()
    {
        return $this->userTime;
    }
}

