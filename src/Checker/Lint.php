<?php
/**
 * 
 * @author: Rebangm <rebangm@gmail.com>
 * Date: 07/08/14
 * Time: 10:09
 */

namespace Rebangm\Checker;


use Symfony\Component\Config\Definition\Exception\Exception;

class Lint {

    private $sourceDirectory;

    public function __construct($sourceDirectory){
        $this->sourceDirectory = $sourceDirectory;

    }

    public function lint(){

        $this->execute(__DIR__ ."/../../test/phpFileToLint.php");
    }

    private function execute($file){
        $cmd = "php -l ". $file;
        try{
            $output = shell_exec($cmd);
        }catch (Exception $e){
            echo "####" . $e->getMessage() ."####";
        }
        return $output;
    }

} 