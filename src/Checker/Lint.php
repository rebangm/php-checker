<?php
/**
 * 
 * @author: Rebangm <rebangm@gmail.com>
 * Date: 07/08/14
 * Time: 10:09
 */

namespace Rebangm\Checker;


use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Finder\Finder;

class Lint {

    private $sourceDirectories;

    private $files;

    public function __construct($sourceDirectory){
        $this->sourceDirectories = $sourceDirectory;

    }

    public function lint(){
        $this->findFiles($this->sourceDirectories);
        foreach($this->files as $file){
            $this->execute($file->getRealpath());
        }
    }

    /**
     * Find files with php extension
     * @param $include
     */
    private function findFiles($directories){
        $finder = new Finder();
        $finder->in($directories);
        $this->files = $finder->files()->name('*.php');
    }

    //TODO use proc_open to redirect std(in|out|err) to file or catch excpetion
    private function execute($file){
        var_dump(realpath($file));
        $cmd = "php -l ". $file;
        try{
            exec($cmd,$output);
        }catch (Exception $e){
            //echo "####" . $e->getMessage() ."####";
        }
        return $output;
    }

} 