<?php



/**

 * @author : Rebangm <rebangm@gmail.com>
 * Date: 06/08/14
 * Time: 10:40
 */

namespace Rebangm\Checker\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Rebangm\Checker\Lint;


class LintCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName("tool:phplint")
            ->setDescription('quickly measuring the size and analyzing the structure of a PHP project');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $lint = new Lint("src/");
        $lint->lint();
        $output->writeln("Hola");
    }
}