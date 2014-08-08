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
            ->setDescription('check php syntax')
            ->setDefinition(
                array(
                    new InputArgument(
                        'directory',
                        InputArgument::IS_ARRAY | InputArgument::REQUIRED
                    )
                )
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if($input->hasArgument("directory")){
            $lint = new Lint($input->getArgument("directory"));
            $lint->lint();
            $output->writeln("Hola");
        }
    }
}