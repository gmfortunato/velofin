<?php
/**
 * Created by PhpStorm.
 * User: Gustavo Mello
 * Date: 08/05/2017
 * Time: 22:46
 */
declare(strict_types=1);

namespace VELOFin\Auth;


interface AuthInterface
{
    public function login(array $credentials):bool;

    public function check():bool;

    public function logout(): void;

    public function hashPassword(string $password): string;
}