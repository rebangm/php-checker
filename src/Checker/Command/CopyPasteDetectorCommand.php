<?php



/**
 * Created by PhpStorm.
 * User: rtwf6589
 * Date: 06/08/14
 * Time: 10:40
 */

namespace Rebangm\Checker\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use SebastianBergmann\PHPCPD\CLI\Command as phpCpdCommand;


class CopyPasteDetectorCommand extends phpCpdCommand
{
    protected function configure()
    {
        parent::configure();
        $this->setName("php:phpcpd")
            ->setDescription('Copy/Paste Detector (CPD) for PHP code.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
    }
}