<?php

namespace AppBundle\EventListener;

use AppBundle\Templating\MyAdminGlobalVariable;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class SetPlatformUIPageLayoutListener implements EventSubscriberInterface
{
    /**
     * @var \AppBundle\Templating\MyAdminGlobalVariable
     */
    protected $globalVariable;

    /**
     * @var string
     */
    protected $pageLayout;

    /**
     * Constructor.
     *
     * @param \AppBundle\Templating\MyAdminGlobalVariable $globalVariable
     * @param string $pageLayout
     */
    public function __construct(MyAdminGlobalVariable $globalVariable, $pageLayout)
    {
        $this->globalVariable = $globalVariable;
        $this->pageLayout = $pageLayout;
    }

    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(KernelEvents::REQUEST => 'onKernelRequest');
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        if (!$this->isPlatformUIRequest($event->getRequest())) {
            return;
        }

        $this->globalVariable->setPageLayout($this->pageLayout);
    }

    protected function isPlatformUIRequest(Request $request)
    {
        return $request->headers->has('x-ajax-update');
    }
}
