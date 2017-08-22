<?php

namespace AppBundle\Entity\Ez;

use DateTime;

/**
 * Url
 */
class Url
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $created = 0;

    /**
     * @var bool
     */
    private $isValid = true;

    /**
     * @var int
     */
    private $lastChecked = 0;

    /**
     * @var int
     */
    private $modified = 0;

    /**
     * @var string
     */
    private $originalUrlMd5;

    /**
     * @var string
     */
    private $url;

    public function __construct($url)
    {
        $this->setUrl($url);
    }

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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Url
     */
    public function setCreated($created)
    {
        $this->created = $created->getTimestamp();

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->getDateTimeObject($this->created);
    }

    /**
     * Set isValid
     *
     * @param boolean $isValid
     *
     * @return Url
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;

        return $this;
    }

    /**
     * Get isValid
     *
     * @return bool
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Set lastChecked
     *
     * @param \DateTime $lastChecked
     *
     * @return Url
     */
    public function setLastChecked($lastChecked)
    {
        $this->lastChecked = $lastChecked->getTimestamp();

        return $this;
    }

    /**
     * Get lastChecked
     *
     * @return \DateTime
     */
    public function getLastChecked()
    {
        return $this->getDateTimeObject($this->lastChecked);
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Url
     */
    public function setModified($modified)
    {
        $this->modified = $modified->getTimestamp();

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->getDateTimeObject($this->modified);
    }

    /**
     * Set originalUrlMd5
     */
    public function setOriginalUrlMd5()
    {
        $this->originalUrlMd5 = md5($this->url);
    }

    /**
     * Get originalUrlMd5
     *
     * @return string
     */
    public function getOriginalUrlMd5()
    {
        return $this->originalUrlMd5;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Url
     */
    public function setUrl($url)
    {
        $this->url = $url;
        $this->setOriginalUrlMd5();

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param int $timestamp
     *
     * @return DateTime
     */
    private function getDateTimeObject($timestamp)
    {
        $dateTime = new DateTime();
        $dateTime->setTimestamp($timestamp);

        return $dateTime;
    }
}

