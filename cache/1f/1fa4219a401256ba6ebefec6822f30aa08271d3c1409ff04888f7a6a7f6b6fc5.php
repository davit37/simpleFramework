<?php

/* index.html.twig */
class __TwigTemplate_904b72d1d494ee40c4aaef90957464dac2c9e68a75bc2be8359b506a54e6a4b1 extends Twig_Template
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
        echo "<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Tugas</td>
            <td>Selesai</td>
            <td>Pilihan</td>
        </tr>
    </thead>

<tbody>
    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["todos"] ?? null));
        foreach ($context['_seq'] as $context["i"] => $context["todo"]) {
            // line 13
            echo "    <tr>
        <td>";
            // line 14
            echo twig_escape_filter($this->env, ($context["i"] + 1), "html", null, true);
            echo "</td>
        <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["todo"], "activity", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 16
            echo ((twig_get_attribute($this->env, $this->source, $context["todo"], "isDone", array())) ? ("Selesai") : ("Belum"));
            echo "</td>
    <td>";
            // line 17
            if ((false == twig_get_attribute($this->env, $this->source, $context["todo"], "isDone", array()))) {
                echo "<a href=\"/todo/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["todo"], "id", array()), "html", null, true);
                echo "/done\">Selesai</a>
         | ";
            }
            // line 18
            echo "<a href=\"/todo/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["todo"], "id", array()), "html", null, true);
            echo "/edit\">Edit</a> | <a href=\"/todo/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["todo"], "id", array()), "html", null, true);
            echo "/delete\">Hapus</a></td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['todo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "</tbody>
</table>
<p><a href='/todo/new'>Tambah</a></p>";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 21,  62 => 18,  55 => 17,  51 => 16,  47 => 15,  43 => 14,  40 => 13,  36 => 12,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html.twig", "C:\\xampp\\htdocs\\modernFm\\Template\\index.html.twig");
    }
}
