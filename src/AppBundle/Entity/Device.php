<?php

namespace cocose\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Device
 *
 * @ORM\Table(name="device")
 * @ORM\Entity(repositoryClass="cocose\WebBundle\Repository\DeviceRepository")
 */
class Device
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
     * @ORM\Column(name="deviceTitle", type="string", length=255)
     */
    private $deviceTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="deviceContent", type="string", length=255)
     */
    private $deviceContent;

    /**
     * @var string
     *
     * @ORM\Column(name="deviceStatus", type="string", length=255)
     */
    private $deviceStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="deviceSketch", type="string", length=255)
     */
    private $deviceSketch;

    /**
     * @var string
     *
     * @ORM\Column(name="deviceImage", type="string", length=255)
     */
    private $deviceImage;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deviceDate", type="datetime")
     */

    private $deviceTime;


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
     * Set deviceTitle
     *
     * @param string $deviceTitle
     *
     * @return Device
     */
    public function setDeviceTitle($deviceTitle)
    {
        $this->deviceTitle = $deviceTitle;

        return $this;
    }

    /**
     * Get deviceTitle
     *
     * @return string
     */
    public function getDeviceTitle()
    {
        return $this->deviceTitle;
    }

    /**
     * Set deviceContent
     *
     * @param string $deviceContent
     *
     * @return Device
     */
    public function setDeviceContent($deviceContent)
    {
        $this->deviceContent = $deviceContent;

        return $this;
    }

    /**
     * Get deviceContent
     *
     * @return string
     */
    public function getDeviceContent()
    {
        return $this->deviceContent;
    }

    /**
     * Set deviceStatus
     *
     * @param string $deviceStatus
     *
     * @return Device
     */
    public function setDeviceStatus($deviceStatus)
    {
        $this->deviceStatus = $deviceStatus;

        return $this;
    }

    /**
     * Get deviceStatus
     *
     * @return string
     */
    public function getDeviceStatus()
    {
        return $this->deviceStatus;
    }

    /**
     * Set deviceSketch
     *
     * @param string $deviceSketch
     *
     * @return Device
     */
    public function setDeviceSketch($deviceSketch)
    {
        $this->deviceSketch = $deviceSketch;

        return $this;
    }

    /**
     * Get deviceSketch
     *
     * @return string
     */
    public function getDeviceSketch()
    {
        return $this->deviceSketch;
    }

    /**
     * Set deviceImage
     *
     * @param string $deviceImage
     *
     * @return Device
     */
    public function setDeviceImage($deviceImage)
    {
        $this->deviceImage = $deviceImage;

        return $this;
    }

    /**
     * Get deviceImage
     *
     * @return string
     */
    public function getDeviceImage()
    {
        return $this->deviceImage;
    }

    /**
     * Set deviceTime
     *
     * @param string $deviceTime
     *
     * @return Device
     */
    public function setDeviceTime($deviceTime)
    {
        $this->deviceTime = $deviceTime;

        return $this;
    }

    /**
     * Get deviceTime
     *
     * @return string
     */
    public function getDeviceTime()
    {
        return $this->deviceTime;
    }
}

