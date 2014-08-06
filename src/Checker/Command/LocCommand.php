<?php



/**
 * Created by PhpStorm.
 * User: rtwf6589
 * Date: 06/08/14
 * Time: 10:40
 */

namespace Rebangm\Checker\Command;

#use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use SebastianBergmann\PHPLOC\CLI\Command as phpLocCommand;

class LocCommand extends phpLocCommand
{
    protected function configure()
    {
        parent::configure();
        $this->setName("php:phploc")
            ->setDescription('quickly measuring the size and analyzing the structure of a PHP project');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
    }
}