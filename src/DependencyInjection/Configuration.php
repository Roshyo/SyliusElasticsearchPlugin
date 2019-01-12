<?php

declare(strict_types=1);

namespace Setono\SyliusElasticsearchPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author jdk
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('setono_sylius_elasticsearch');
        $rootNode
            ->children()
                ->arrayNode('index_configs')
                    ->prototype('array')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('index_name')->isRequired()->cannotBeEmpty()->end()
                            ->scalarNode('type_name')->isRequired()->cannotBeEmpty()->end()
                            ->scalarNode('model_class')->isRequired()->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('attributes')
                    ->scalarPrototype()->end()
                ->end()
                ->variableNode('finder_indexes')
                    ->defaultValue([])
                ->end()
            ->end();

        return $treeBuilder;
    }
}