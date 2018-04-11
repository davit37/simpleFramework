<?php

/* edit.html.twig */
class __TwigTemplate_d9624ac986bf02abc6d7d68d8731e0782a6aba1e18d5649110a3658a1254d654 extends Twig_Template
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
        echo "<form action=\"/todo/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["todo"] ?? null), "id", array()), "html", null, true);
        echo "/edit\" method=\"POST\">
    <input type=\"text\" name=\"activity\" value=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["todo"] ?? null), "activity", array()), "html", null, true);
        echo "\"/>
    <button type=\"submit\">Simpan</button>
</form>";
    }

    public function getTemplateName()
    {
        return "edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "edit.html.twig", "C:\\xampp\\htdocs\\modernFm\\Template\\edit.html.twig");
    }
}
