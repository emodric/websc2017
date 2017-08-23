<?php

namespace AppBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\Controller;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;

class UrlController extends Controller
{
    public function listUrlsAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $queryBuilder = $em->createQueryBuilder()
            ->select('u')
            ->from('AppBundle:Ez\Url', 'u');

        $pager = new Pagerfanta(new DoctrineORMAdapter($queryBuilder));
        $pager->setNormalizeOutOfRangePages(true);
        $pager->setMaxPerPage(3);
        $pager->setCurrentPage((int)$request->query->get('page', 1));

        return $this->render('@App/url/list.html.twig', array('urls' => $pager));
    }

    public function viewUrlAction($urlId)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $urlRepo = $em->getRepository('AppBundle:Ez\Url');
        $linkRepo = $em->getRepository('AppBundle:Ez\UrlContentLink');
        $contentService = $this->getRepository()->getContentService();

        $url = $urlRepo->find($urlId);
        $links = $linkRepo->findBy(array('urlId' => $url->getId()));

        $content = array();

        foreach ($links as $link) {
            $contentId = $linkRepo->getContentId($link);
            if (!isset($content[$contentId])) {
                $content[$contentId] = $contentService->loadContent($contentId);
            }
        }

        return $this->render('@App/url/view.html.twig', array('url' => $url, 'relatedContent' => $content));
    }

    public function editUrlAction()
    {
    }
}
