<?php
/**
 * Created by PhpStorm.
 * User: Gustavo Mello
 * Date: 08/05/2017
 * Time: 22:50
 */

namespace VELOFin\Auth;


class Auth implements AuthInterface
{

    /**
     * @var JasnyAuth
     */
    private $jasnyAuth;


    /**
     * Auth constructor.
     */
    public function __construct(JasnyAuth $jasnyAuth)
    {
        $this->jasnyAuth = $jasnyAuth;
    }

    public function login(array $credentials): bool
    {
        list('email' => $email, 'password' => $password) = $credentials;
        return $this->jasnyAuth->login($email, $password) !== null;
    }

    public function check(): bool
    {
        // TODO: Implement check() method.
    }

    public function logout(): void
    {
        // TODO: Implement logout() method.
    }

    public function hashPassword(string $password): string
    {
        return $this->jasnyAuth->hashPassword($password);
    }
}