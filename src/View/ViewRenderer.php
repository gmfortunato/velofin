<?php
/**
 * Created by PhpStorm.
 * User: Gustavo Mello
 * Date: 30/04/2017
 * Time: 19:18
 */

namespace VELOFin\View;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class ViewRenderer implements ViewRendererInterface
{
    /**
     * @var \Twig_Environment
     */
    private $twigEnvironment;

    public function __construct(\Twig_Environment $twigEnvironment)
    {

        $this->twigEnvironment = $twigEnvironment;
    }

    public function render(string $template, array $context = []): ResponseInterface
    {
        $result = $this->twigEnvironment->render($template, $context);
        $response = new Response();
        $response->getBody()->write($result);
        return $response;
    }

}