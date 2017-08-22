<?php

namespace AppBundle\Entity\Ez;

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
    private $created;

    /**
     * @var bool
     */
    private $isValid;

    /**
     * @var int
     */
    private $lastChecked;

    /**
     * @var int
     */
    private $modified;

    /**
     * @var string
     */
    private $originalUrlMd5;

    /**
     * @var string
     */
    private $url;

    /**
     * Constructor.
     *
     * @param string $url
     */
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
     * @param integer $created
     *
     * @return Url
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
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
     * @param integer $lastChecked
     *
     * @return Url
     */
    public function setLastChecked($lastChecked)
    {
        $this->lastChecked = $lastChecked;

        return $this;
    }

    /**
     * Get lastChecked
     *
     * @return int
     */
    public function getLastChecked()
    {
        return $this->lastChecked;
    }

    /**
     * Set modified
     *
     * @param integer $modified
     *
     * @return Url
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return int
     */
    public function getModified()
    {
        return $this->modified;
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
}

