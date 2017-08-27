<?php

namespace AppBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\API\Repository\Values\Content\Content;
use eZ\Publish\API\Repository\Values\Content\Field;

class ContentController extends Controller
{
    public function contentUrlsAction(Content $content)
    {
        $fieldIds = array_map(
            function (Field $field) {
                return $field->id;
            },
            $content->getFields()
        );

        $em = $this->get('doctrine.orm.entity_manager');

        $contentLinks = $em->getRepository('AppBundle:Ez\UrlContentLink')
            ->findBy(
                array(
                    'contentFieldId' => $fieldIds,
                    'contentFieldVersion' => $content->getVersionInfo()->versionNo
                )
            );

        $urls = array();

        foreach ($contentLinks as $contentLink) {
            if (!isset($urls[$contentLink->getUrlId()])) {
                $urls[$contentLink->getUrlId()] = $contentLink->getUrl();
            }
        }

        return $this->render('@App/url/content_urls.html.twig', array('urls' => $urls, 'content' => $content));
    }
}
