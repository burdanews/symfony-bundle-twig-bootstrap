<?php

namespace HBM\TwigBootstrapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
  /**
   * {@inheritdoc}
   */
  public function getConfigTreeBuilder()
  {
    $treeBuilder = new TreeBuilder('hbm_twig_bootstrap');

    if (method_exists($treeBuilder, 'getRootNode')) {
      $rootNode = $treeBuilder->getRootNode();
    } else {
      $rootNode = $treeBuilder->root('hbm_twig_bootstrap');
    }

    $rootNode
      ->children()
        ->arrayNode('fontawesome')->addDefaultsIfNotSet()
          ->children()
            ->scalarNode('default_class')->defaultValue('fas')->end()
          ->end()
        ->end()
      ->end()
    ->end();

    return $treeBuilder;
  }

}
