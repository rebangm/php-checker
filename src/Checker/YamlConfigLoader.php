<?php
/**
 * 
 * @author: Jean-Philippe Dépigny <jdepigny.ext@orange.com>
 * Date: 07/08/14
 * Time: 11:18
 */

namespace Rebangm\Checker;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Yaml\Yaml;

class YamlConfigLoader extends FileLoader
{
    public function load($resource, $type = null)
    {
        $configValues = Yaml::parse($resource);
        var_dump($configValues);

        // ... handle the config values

        // maybe import some other resource:

        // $this->import('extra_users.yml');
    }

    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'yml' === pathinfo(
            $resource,
            PATHINFO_EXTENSION
        );
    }
}