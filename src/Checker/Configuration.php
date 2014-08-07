<?php
/**
 * @author : Rebangm <rebangm@gmail.com>
 * Date: 07/08/14
 * Time: 22:21
 */

namespace Rebangm\Checker;


use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('checker');

        $rootNode
            ->children()
                ->scalarNode('resultDirectory')
                    ->isRequired()
                ->end()
                ->arrayNode('tools')
                    ->append($this->getPhpCpdNode())
                    ->append($this->getPhpLocNode())

            ->end()
        ;
        //var_dump($rootNode);
        return $treeBuilder;
    }

    private function getPhpCpdNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('phpcpd');

        $node
            ->children()
                ->scalarNode('path')
                    ->isRequired()
                ->end()
                ->scalarNode('names')->end()
                ->scalarNode('names_exclude')->end()
                ->scalarNode('exclude')->end()
                ->scalarNode('log_pmd')->end()
                ->scalarNode('min_lines')->end()
                ->scalarNode('min_tokens')->end()
            ->end()
        ;

        return $node;
    }

    private function getPhpLocNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('phploc');
        $node
            ->children()
                ->scalarNode('names')->end()
                ->scalarNode('names_exclude')->end()
                ->scalarNode('count_tests')->end()
                ->scalarNode('git_repository')->end()
                ->scalarNode('exclude')->end()
                ->scalarNode('log_csv')->end()
                ->scalarNode('log_xml')->end()
            ->end()
        ;

        return $node;
    }

}