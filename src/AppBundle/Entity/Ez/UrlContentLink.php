<?php

namespace AppBundle\Entity\Ez;

use eZ\Publish\API\Repository\Values\Content\Field;

/**
 * UrlContentLink
 */
class UrlContentLink
{
    /**
     * @var int
     */
    private $urlId;

    /**
     * @var int
     */
    private $contentFieldId;

    /**
     * @var int
     */
    private $contentFieldVersion;

    public function __construct(Url $url, Field $field, $versionNo)
    {
        $this->setUrlId($url->getId());
        $this->setContentFieldId($field->id);
        $this->setContentFieldVersion($versionNo);
    }

    /**
     * Set urlId
     *
     * @param integer $urlId
     *
     * @return UrlContentLink
     */
    public function setUrlId($urlId)
    {
        $this->urlId = $urlId;

        return $this;
    }

    /**
     * Get urlId
     *
     * @return int
     */
    public function getUrlId()
    {
        return $this->urlId;
    }

    /**
     * Set contentFieldId
     *
     * @param integer $contentFieldId
     *
     * @return UrlContentLink
     */
    public function setContentFieldId($contentFieldId)
    {
        $this->contentFieldId = $contentFieldId;

        return $this;
    }

    /**
     * Get contentFieldId
     *
     * @return int
     */
    public function getContentFieldId()
    {
        return $this->contentFieldId;
    }

    /**
     * Set contentFieldVersion
     *
     * @param int $contentFieldVersion
     *
     * @return UrlContentLink
     */
    public function setContentFieldVersion($contentFieldVersion)
    {
        $this->contentFieldVersion = $contentFieldVersion;

        return $this;
    }

    /**
     * Get contentFieldVersion
     *
     * @return int
     */
    public function getContentFieldVersion()
    {
        return $this->contentFieldVersion;
    }
}

