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
use PDepend\TextUI\Command as PdependMainCommand;


class PDependCommand extends Command
{
    protected function configure()
    {

        $this->setName("tool:pdepend")
            ->setDescription('Pdepend');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info> Work in progress </info>");
        //PdependMainCommand::main();
    }
}