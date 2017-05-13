<?php
declare(strict_types=1);

namespace VELOFin\Plugins;

use Interop\Container\ContainerInterface;
use VELOFin\Models\CategoryCost;
use VELOFin\Models\User;
use VELOFin\Repository\RepositoryFactory;
use VELOFin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

class DbPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['development']);
        $capsule->bootEloquent();

        $container->add('repository.factory', new RepositoryFactory());
        $container->addLazy('category-cost.repository', function(ContainerInterface $container)
        {
            return $container->get('repository.factory')->factory(CategoryCost::class);
        });

        $container->addLazy('user.repository', function(ContainerInterface $container)
        {
            return $container->get('repository.factory')->factory(User::class);
        });


    }

}