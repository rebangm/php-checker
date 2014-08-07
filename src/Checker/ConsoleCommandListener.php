<?php
/**
 * 
 * @author: Jean-Philippe Dépigny <jdepigny.ext@orange.com>
 * Date: 07/08/14
 * Time: 12:07
 */

namespace Rebangm\Checker;

use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\ConsoleEvents;

class ConsoleCommandListener {

    public function onConsoleCommand(ConsoleCommandEvent $event) {
        // get the output instance
        $output = $event->getOutput();

        // get the command to be executed
        $command = $event->getCommand();

        // write something about the command
        $output->writeln(sprintf('Before running command <info>%s</info>', $command->getName()));
    }

} 