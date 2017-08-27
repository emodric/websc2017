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

    /**
     * @var \AppBundle\Entity\Ez\Url
     */
    private $url;

    public function __construct(Url $url, Field $field, $versionNo)
    {
        $this->url = $url;

        $this->urlId = $url->getId();
        $this->contentFieldId = $field->id;
        $this->contentFieldVersion = $versionNo;
    }

    /**
     * Get url
     *
     * @return \AppBundle\Entity\Ez\Url
     */
    public function getUrl()
    {
        return $this->url;
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
     * Get contentFieldId
     *
     * @return int
     */
    public function getContentFieldId()
    {
        return $this->contentFieldId;
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

