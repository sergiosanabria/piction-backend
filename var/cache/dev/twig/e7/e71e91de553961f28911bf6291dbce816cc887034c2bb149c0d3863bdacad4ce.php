<?php

/* @Twig/Exception/traces.txt.twig */
class __TwigTemplate_83465c16b6c7b996e84a31f888a9a7b1e2205769b8dc20b6384ce0940522573f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1709a75dd3d5a4f889820a9bcb6feb8c67f751569ef81e648867ac1c754d73e2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1709a75dd3d5a4f889820a9bcb6feb8c67f751569ef81e648867ac1c754d73e2->enter($__internal_1709a75dd3d5a4f889820a9bcb6feb8c67f751569ef81e648867ac1c754d73e2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        $__internal_ff3cc2d07288aff73f5fd06ac2b394461506b3ccfd5ff79ec339f1355a60dbd4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ff3cc2d07288aff73f5fd06ac2b394461506b3ccfd5ff79ec339f1355a60dbd4->enter($__internal_ff3cc2d07288aff73f5fd06ac2b394461506b3ccfd5ff79ec339f1355a60dbd4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("@Twig/Exception/trace.txt.twig", "@Twig/Exception/traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_1709a75dd3d5a4f889820a9bcb6feb8c67f751569ef81e648867ac1c754d73e2->leave($__internal_1709a75dd3d5a4f889820a9bcb6feb8c67f751569ef81e648867ac1c754d73e2_prof);

        
        $__internal_ff3cc2d07288aff73f5fd06ac2b394461506b3ccfd5ff79ec339f1355a60dbd4->leave($__internal_ff3cc2d07288aff73f5fd06ac2b394461506b3ccfd5ff79ec339f1355a60dbd4_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 4,  31 => 3,  27 => 2,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if exception.trace|length %}
{% for trace in exception.trace %}
{% include '@Twig/Exception/trace.txt.twig' with { 'trace': trace } only %}

{% endfor %}
{% endif %}
", "@Twig/Exception/traces.txt.twig", "/var/www/html/pictograma-backend/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/traces.txt.twig");
    }
}
