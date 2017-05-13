<?php
/**
 * Created by PhpStorm.
 * User: Gustavo Mello
 * Date: 04/05/2017
 * Time: 10:10
 */

namespace VELOFin\Repository;


class RepositoryFactory
{
    public static  function factory(string $modelClass)
    {
        return new DefaultRepository($modelClass);
    }
}