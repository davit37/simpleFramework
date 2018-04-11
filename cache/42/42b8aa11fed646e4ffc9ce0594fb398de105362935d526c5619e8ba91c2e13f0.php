<?php

/* new.html.twig */
class __TwigTemplate_d3be826b0b4b7a25f1cbf326fe72ba276a7e28e306a5d855ef4c688c97e27f03 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form action=\"/todo/new\" method=\"POST\">
    <input type=\"text\" name=\"activity\">
    <button type=\"submit\">Simpan</button>
</form>";
    }

    public function getTemplateName()
    {
        return "new.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "new.html.twig", "C:\\xampp\\htdocs\\modernFm\\Template\\new.html.twig");
    }
}
