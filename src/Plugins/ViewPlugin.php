<?php
declare(strict_types=1);

namespace VELOFin\Plugins;

use Interop\Container\ContainerInterface;
use VELOFin\ServiceContainerInterface;
use VELOFin\View\ViewRenderer;

class ViewPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function(ContainerInterface $container)
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
            $twig = new \Twig_Environment($loader);

            $generator = $container->get('routing.generator');
            $twig->addFunction(new \Twig_SimpleFunction('route',
                function (string $name, array $params = []) use ($generator){
                    return $generator->generate($name,$params);
            }));
            return $twig;
        });

        $container->addLazy('view.renderer', function (ContainerInterface $container){
           $twigEnviroment = $container->get('twig');
           return new ViewRenderer($twigEnviroment);
        });
    }

}