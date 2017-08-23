<?php

namespace AppBundle\Templating;

class MyAdminGlobalVariable
{
    /**
     * @var string
     */
    protected $pageLayout;

    /**
     * Constructor.
     *
     * @param string $pageLayout
     */
    public function __construct($pageLayout)
    {
        $this->setPageLayout($pageLayout);
    }

    /**
     * @param string $pageLayout
     */
    public function setPageLayout($pageLayout)
    {
        $this->pageLayout = $pageLayout;
    }

    /**
     * @return string
     */
    public function getPageLayout()
    {
        return $this->pageLayout;
    }
}
