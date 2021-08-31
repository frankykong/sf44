<?php

namespace cocose\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Works
 *
 * @ORM\Table(name="works")
 * @ORM\Entity(repositoryClass="cocose\WebBundle\Repository\WorksRepository")
 */
class Works
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
     * @ORM\Column(name="userName", type="text")
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="userTitle", type="text")
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
     * @ORM\Column(name="userContent", type="text")
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
     * @return Works
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
     * @return Works
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
     * @return Works
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
     * @return Works
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
     * @return Works
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
     * @return Works
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

