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
use Rebangm\Checker\Lint\LintSettings;
use JakubOnderka\PhpParallelLint;


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
        try {
            $settings = new PhpParallelLint\Settings();
            //$output->writeln("Hola");
            if($input->hasArgument("directory")){
                $settings->paths = $input->getArgument("directory");
            }

            if($input->hasOption("exclude")){
                $settings->excluded = $input->getOption("exclude");
            }

            if($input->hasOption("extension")){
                $settings->extensions = $input->getOption("extension");
            }

            if($input->hasOption("number-jobs")){
                $settings->parallelJobs = $input->getOption("number-jobs");
            }

            if($input->hasOption("no-colors")){
                $settings->colors = false;
            }
            $manager = new PhpParallelLint\Manager;
            $result = $manager->run($settings);


        }catch(Exception $e){

        }
    }
}