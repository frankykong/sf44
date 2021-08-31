<?php

namespace cocose\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipment
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity(repositoryClass="cocose\WebBundle\Repository\EquipmentRepository")
 */
class Equipment
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
     * @ORM\Column(name="equipmentName", type="string", length=255)
     */
    private $equipmentName;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentEmail", type="string", length=255)
     */
    private $equipmentEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentPhone", type="string", length=255)
     */
    private $equipmentPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentNumber", type="string", length=255)
     */
    private $equipmentNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentTeacher", type="string", length=255)
     */
    private $equipmentTeacher;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentClass", type="string", length=255)
     */
    private $equipmentClass;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentDate", type="string", length=255)
     */
    private $equipmentDate;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentReturndate", type="string", length=255)
     */
    private $equipmentReturndate;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentContent", type="string", length=255)
     */
    private $equipmentContent;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentStatus", type="string", length=255)
     */
    private $equipmentStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="equipmentQuantity", type="string", length=255)
     */
    private $equipmentQuantity;


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
     * Set equipmentName
     *
     * @param string $equipmentName
     *
     * @return Equipment
     */
    public function setEquipmentName($equipmentName)
    {
        $this->equipmentName = $equipmentName;

        return $this;
    }

    /**
     * Get equipmentName
     *
     * @return string
     */
    public function getEquipmentName()
    {
        return $this->equipmentName;
    }

    /**
     * Set equipmentEmail
     *
     * @param string $equipmentEmail
     *
     * @return Equipment
     */
    public function setEquipmentEmail($equipmentEmail)
    {
        $this->equipmentEmail = $equipmentEmail;

        return $this;
    }

    /**
     * Get equipmentEmail
     *
     * @return string
     */
    public function getEquipmentEmail()
    {
        return $this->equipmentEmail;
    }

    /**
     * Set equipmentPhone
     *
     * @param string $equipmentPhone
     *
     * @return Equipment
     */
    public function setEquipmentPhone($equipmentPhone)
    {
        $this->equipmentPhone = $equipmentPhone;

        return $this;
    }

    /**
     * Get equipmentPhone
     *
     * @return string
     */
    public function getEquipmentPhone()
    {
        return $this->equipmentPhone;
    }

    /**
     * Set equipmentNumber
     *
     * @param string $equipmentNumber
     *
     * @return Equipment
     */
    public function setEquipmentNumber($equipmentNumber)
    {
        $this->equipmentNumber = $equipmentNumber;

        return $this;
    }

    /**
     * Get equipmentNumber
     *
     * @return string
     */
    public function getEquipmentNumber()
    {
        return $this->equipmentNumber;
    }

    /**
     * Set equipmentTeacher
     *
     * @param string $equipmentTeacher
     *
     * @return Equipment
     */
    public function setEquipmentTeacher($equipmentTeacher)
    {
        $this->equipmentTeacher = $equipmentTeacher;

        return $this;
    }

    /**
     * Get equipmentTeacher
     *
     * @return string
     */
    public function getEquipmentTeacher()
    {
        return $this->equipmentTeacher;
    }

    /**
     * Set equipmentClass
     *
     * @param string $equipmentClass
     *
     * @return Equipment
     */
    public function setEquipmentClass($equipmentClass)
    {
        $this->equipmentClass = $equipmentClass;

        return $this;
    }

    /**
     * Get equipmentClass
     *
     * @return string
     */
    public function getEquipmentClass()
    {
        return $this->equipmentClass;
    }

    /**
     * Set equipmentDate
     *
     * @param string $equipmentDate
     *
     * @return Equipment
     */
    public function setEquipmentDate($equipmentDate)
    {
        $this->equipmentDate = $equipmentDate;

        return $this;
    }

    /**
     * Get equipmentDate
     *
     * @return string
     */
    public function getEquipmentDate()
    {
        return $this->equipmentDate;
    }

    /**
     * Set equipmentReturndate
     *
     * @param string $equipmentReturndate
     *
     * @return Equipment
     */
    public function setEquipmentReturndate($equipmentReturndate)
    {
        $this->equipmentReturndate = $equipmentReturndate;

        return $this;
    }

    /**
     * Get equipmentReturndate
     *
     * @return string
     */
    public function getEquipmentReturndate()
    {
        return $this->equipmentReturndate;
    }

    /**
     * Set equipmentContent
     *
     * @param string $equipmentContent
     *
     * @return Equipment
     */
    public function setEquipmentContent($equipmentContent)
    {
        $this->equipmentContent = $equipmentContent;

        return $this;
    }

    /**
     * Get equipmentContent
     *
     * @return string
     */
    public function getEquipmentContent()
    {
        return $this->equipmentContent;
    }

    /**
     * Set equipmentStatus
     *
     * @param string $equipmentStatus
     *
     * @return Equipment
     */
    public function setEquipmentStatus($equipmentStatus)
    {
        $this->equipmentStatus = $equipmentStatus;

        return $this;
    }

    /**
     * Get equipmentStatus
     *
     * @return string
     */
    public function getEquipmentStatus()
    {
        return $this->equipmentStatus;
    }

    /**
     * Set equipmentQuantity
     *
     * @param string $equipmentQuantity
     *
     * @return Equipment
     */
    public function setEquipmentQuantity($equipmentQuantity)
    {
        $this->equipmentQuantity = $equipmentQuantity;

        return $this;
    }

    /**
     * Get equipmentQuantity
     *
     * @return string
     */
    public function getEquipmentQuantity()
    {
        return $this->equipmentQuantity;
    }
}

