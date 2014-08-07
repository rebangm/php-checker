<?php

namespace Rebangm\Checker;

use Rebangm\Checker\Command\TestCommand;
use Rebangm\Checker\Command\LocCommand;
use Rebangm\Checker\Command\PDependCommand;
use Rebangm\Checker\Command\CopyPasteDetectorCommand;
use Symfony\Component\Console;
use Symfony\Component\Console\Application as BaseApplication;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Yaml\Yaml;

/**
 * @author >
 */
class Application extends BaseApplication
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        error_reporting(-1);

        parent::__construct('Checker-Tool', "Dev");
        $this->getDefinition()->addOption(new InputOption('--configFile', '-c', InputOption::VALUE_REQUIRED, 'path/to/config/file'));

        $this->add(new TestCommand());
        $this->add(new LocCommand());
        $this->add(new CopyPasteDetectorCommand());
        $this->add(new PDependCommand());

        //$this->checkBuildDirectory();

    }

    /**
     * @return string
     */
    public function getLongVersion()
    {
        $version = parent::getLongVersion().' by <comment>Rebangm</comment>';

        return $version;
    }

    public function checkBuildDirectory(){
        $buildDirectory = __DIR__ . "/../../build/";
        if(!(is_dir($buildDirectory) && is_writable($buildDirectory))){
            mkdir($buildDirectory);
        }
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function doRun(InputInterface $input, OutputInterface $output){

        if (true === $input->hasParameterOption(array('--configFile', '-c'))) {
            $configFile = $input->getParameterOption(array('--configFile', '-c'));
            //if(fs->exist(path/to/file))
            $configValues = Yaml::parse(file_get_contents($configFile));

            $processor = new Processor();
            $configuration = new Configuration();
            try {
                $processedConfiguration = $processor->processConfiguration(
                    $configuration,
                    $configValues
                );

                // configuration validated

            } catch (Exception $e) {
                // validation error
                echo $e->getMessage() . PHP_EOL;
            }
        }

        return parent::doRun($input, $output);
    }
}







