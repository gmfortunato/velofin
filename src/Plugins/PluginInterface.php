<?php

namespace VELOFin\Plugins;


use VELOFin\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}