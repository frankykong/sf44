<?php

namespace cocose\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserve
 *
 * @ORM\Table(name="reserve")
 * @ORM\Entity(repositoryClass="cocose\WebBundle\Repository\ReserveRepository")
 */
class Reserve
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
     * @ORM\Column(name="reserveName", type="string", length=255)
     */
    private $reserveName;

    /**
     * @var string
     *
     * @ORM\Column(name="reserveEmail", type="string", length=255)
     */
    private $reserveEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="reservePhone", type="string", length=255)
     */
    private $reservePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="reserveNumber", type="string", length=255)
     */
    private $reserveNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="reserveTeacher", type="string", length=255)
     */
    private $reserveTeacher;

    /**
     * @var string
     *
     * @ORM\Column(name="reserveClass", type="string", length=255)
     */
    private $reserveClass;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reserveDate", type="datetime")
     */
    private $reserveDate;

    /**
     * @var string
     *
     * @ORM\Column(name="reserveTime", type="string", length=255)
     */
    private $reserveTime;

    /**
     * @var string
     *
     * @ORM\Column(name="reserveContent", type="string", length=255)
     */
    private $reserveContent;

    /**
     * @var string
     *
     * @ORM\Column(name="reserveStatus", type="string", length=255)
     */
    private $reserveStatus;


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
     * Set reserveName
     *
     * @param string $reserveName
     *
     * @return Reserve
     */
    public function setReserveName($reserveName)
    {
        $this->reserveName = $reserveName;

        return $this;
    }

    /**
     * Get reserveName
     *
     * @return string
     */
    public function getReserveName()
    {
        return $this->reserveName;
    }

    /**
     * Set reserveEmail
     *
     * @param string $reserveEmail
     *
     * @return Reserve
     */
    public function setReserveEmail($reserveEmail)
    {
        $this->reserveEmail = $reserveEmail;

        return $this;
    }

    /**
     * Get reserveEmail
     *
     * @return string
     */
    public function getReserveEmail()
    {
        return $this->reserveEmail;
    }

    /**
     * Set reservePhone
     *
     * @param string $reservePhone
     *
     * @return Reserve
     */
    public function setReservePhone($reservePhone)
    {
        $this->reservePhone = $reservePhone;

        return $this;
    }

    /**
     * Get reservePhone
     *
     * @return string
     */
    public function getReservePhone()
    {
        return $this->reservePhone;
    }

    /**
     * Set reserveNumber
     *
     * @param string $reserveNumber
     *
     * @return Reserve
     */
    public function setReserveNumber($reserveNumber)
    {
        $this->reserveNumber = $reserveNumber;

        return $this;
    }

    /**
     * Get reserveNumber
     *
     * @return string
     */
    public function getReserveNumber()
    {
        return $this->reserveNumber;
    }

    /**
     * Set reserveTeacher
     *
     * @param string $reserveTeacher
     *
     * @return Reserve
     */
    public function setReserveTeacher($reserveTeacher)
    {
        $this->reserveTeacher = $reserveTeacher;

        return $this;
    }

    /**
     * Get reserveTeacher
     *
     * @return string
     */
    public function getReserveTeacher()
    {
        return $this->reserveTeacher;
    }

    /**
     * Set reserveClass
     *
     * @param string $reserveClass
     *
     * @return Reserve
     */
    public function setReserveClass($reserveClass)
    {
        $this->reserveClass = $reserveClass;

        return $this;
    }

    /**
     * Get reserveClass
     *
     * @return string
     */
    public function getReserveClass()
    {
        return $this->reserveClass;
    }

    /**
     * Set reserveDate
     *
     * @param \DateTime $reserveDate
     *
     * @return Reserve
     */
    public function setReserveDate($reserveDate)
    {
        $this->reserveDate = $reserveDate;

        return $this;
    }

    /**
     * Get reserveDate
     *
     * @return \DateTime
     */
    public function getReserveDate()
    {
        return $this->reserveDate;
    }

    /**
     * Set reserveTime
     *
     * @param string $reserveTime
     *
     * @return Reserve
     */
    public function setReserveTime($reserveTime)
    {
        $this->reserveTime = $reserveTime;

        return $this;
    }

    /**
     * Get reserveTime
     *
     * @return string
     */
    public function getReserveTime()
    {
        return $this->reserveTime;
    }

    /**
     * Set reserveContent
     *
     * @param string $reserveContent
     *
     * @return Reserve
     */
    public function setReserveContent($reserveContent)
    {
        $this->reserveContent = $reserveContent;

        return $this;
    }

    /**
     * Get reserveContent
     *
     * @return string
     */
    public function getReserveContent()
    {
        return $this->reserveContent;
    }

    /**
     * Set reserveStatus
     *
     * @param string $reserveStatus
     *
     * @return Reserve
     */
    public function setReserveStatus($reserveStatus)
    {
        $this->reserveStatus = $reserveStatus;

        return $this;
    }

    /**
     * Get reserveStatus
     *
     * @return string
     */
    public function getReserveStatus()
    {
        return $this->reserveStatus;
    }
}

