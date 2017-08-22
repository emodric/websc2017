<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('ezmigration:test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        //$urlRepo = $em->getRepository('AppBundle:Ez\Url');
        //dump($urlRepo->findAll());

        $urlLinkRepo = $em->getRepository('AppBundle:Ez\UrlContentLink');
        dump($urlLinkRepo->findAll());
    }
}
