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

    public function viewUrlAction()
    {
    }

    public function editUrlAction()
    {
    }
}
