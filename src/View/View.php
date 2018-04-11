<?php

namespace ModernFramework\View;

use Symfony\Component\HttpFoundation\Response;

class View
{
    private $twig;

    public function __construct(string $templatePath, string $cachePath = null)
    {
        $this->twig = new \Twig_Environment(
            new \Twig_Loader_Filesystem($templatePath),
            ['cache'=>null !== $cachePath ? $cachePath : false]
        );
    }

    public function render(string $template, array $variables =[])
    {
        return new Response($this->twig->render($template, $variables));
    }
}