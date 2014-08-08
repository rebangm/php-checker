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



class ParallelLintCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName("tool:linter")
            ->setDescription('check php syntax')
            ->setDefinition(
                array(
                    new InputArgument(
                        'directory',
                        InputArgument::IS_ARRAY | InputArgument::REQUIRED
                    )
                )
            )->addOption(
                'extension',
                'x',
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Check only files with selected extensions (default: php,php3,php4,php5,phtml)',
                array('php','php3','php4','php5','phtml')
            )
            ->addOption(
                'exclude',
                'e',
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'A list of directories to exclude',
                array()
            )
            ->addOption(
                'number-jobs',
                'j',
                InputOption::VALUE_OPTIONAL ,
                'Count PHPUnit test case classes and test methods',
                10
            )
            ->addOption(
                'no-colors',
                NULL,
                InputOption::VALUE_NONE,
                'Collect metrics over the history of a Git repository'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {



        if($input->hasArgument("directory")){
            $output->writeln("Hola");
        }




    }
}