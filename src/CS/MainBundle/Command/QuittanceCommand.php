<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/20/17
 * Time: 12:40 PM
 */

namespace CS\MainBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class QuittanceCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('generate:quittance')
            ->setDescription('Generer les quittances')

        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $locations = $em->getRepository('CSMainBundle:Locations')->findActive();

       $count =  array_count_values($locations);


        $output->writeln($count);
    }



}