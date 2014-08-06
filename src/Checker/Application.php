<?php

namespace Rebangm\Checker;

use Rebangm\Checker\Command\TestCommand;
use Rebangm\Checker\Command\LocCommand;
use Rebangm\Checker\Command\PDependCommand;
use Rebangm\Checker\Command\CopyPasteDetectorCommand;
use Symfony\Component\Console;
use Symfony\Component\Console\Application as BaseApplication;


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

        $this->add(new TestCommand());
        $this->add(new LocCommand());
        $this->add(new CopyPasteDetectorCommand());
        $this->add(new PDependCommand());

        $this->checkBuildDirectory();

    }

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
}







