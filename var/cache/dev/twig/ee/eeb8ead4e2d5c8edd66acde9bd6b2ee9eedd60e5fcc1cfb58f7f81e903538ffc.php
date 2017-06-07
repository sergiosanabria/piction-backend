<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_1e74130959adb645342801b4008b2159b9b499e8e0bfe6092e36f46de4efd3a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a108f6c2b323818846ffe000be5850d52e0ac4fbf3180e03cbd29c8bded1ff9e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a108f6c2b323818846ffe000be5850d52e0ac4fbf3180e03cbd29c8bded1ff9e->enter($__internal_a108f6c2b323818846ffe000be5850d52e0ac4fbf3180e03cbd29c8bded1ff9e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $__internal_be6fa6138d4b04322c13f2b4ecaf4cad370488aef55e567cc7e012a26c0b1b46 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_be6fa6138d4b04322c13f2b4ecaf4cad370488aef55e567cc7e012a26c0b1b46->enter($__internal_be6fa6138d4b04322c13f2b4ecaf4cad370488aef55e567cc7e012a26c0b1b46_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a108f6c2b323818846ffe000be5850d52e0ac4fbf3180e03cbd29c8bded1ff9e->leave($__internal_a108f6c2b323818846ffe000be5850d52e0ac4fbf3180e03cbd29c8bded1ff9e_prof);

        
        $__internal_be6fa6138d4b04322c13f2b4ecaf4cad370488aef55e567cc7e012a26c0b1b46->leave($__internal_be6fa6138d4b04322c13f2b4ecaf4cad370488aef55e567cc7e012a26c0b1b46_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_ed18daaeb4dbaca7bbf5b9a85cf1482b1dfc4fbc16cb372bbc3d56f7a535ddc1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ed18daaeb4dbaca7bbf5b9a85cf1482b1dfc4fbc16cb372bbc3d56f7a535ddc1->enter($__internal_ed18daaeb4dbaca7bbf5b9a85cf1482b1dfc4fbc16cb372bbc3d56f7a535ddc1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_57aa2bbd56dc71cdf0f2fc29fe4897ff3522f1f8a44dbabe175b9fca368163a7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_57aa2bbd56dc71cdf0f2fc29fe4897ff3522f1f8a44dbabe175b9fca368163a7->enter($__internal_57aa2bbd56dc71cdf0f2fc29fe4897ff3522f1f8a44dbabe175b9fca368163a7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
";
        
        $__internal_57aa2bbd56dc71cdf0f2fc29fe4897ff3522f1f8a44dbabe175b9fca368163a7->leave($__internal_57aa2bbd56dc71cdf0f2fc29fe4897ff3522f1f8a44dbabe175b9fca368163a7_prof);

        
        $__internal_ed18daaeb4dbaca7bbf5b9a85cf1482b1dfc4fbc16cb372bbc3d56f7a535ddc1->leave($__internal_ed18daaeb4dbaca7bbf5b9a85cf1482b1dfc4fbc16cb372bbc3d56f7a535ddc1_prof);

    }

    // line 136
    public function block_title($context, array $blocks = array())
    {
        $__internal_eac07ef95bc7d6ff308de557847c73c07077e1f69297dd7b5cc8ceeec524c29c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_eac07ef95bc7d6ff308de557847c73c07077e1f69297dd7b5cc8ceeec524c29c->enter($__internal_eac07ef95bc7d6ff308de557847c73c07077e1f69297dd7b5cc8ceeec524c29c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_d640d911ee509abe4b96f6e784792dd0e326c43b9b732f5b7f64a439c4347405 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d640d911ee509abe4b96f6e784792dd0e326c43b9b732f5b7f64a439c4347405->enter($__internal_d640d911ee509abe4b96f6e784792dd0e326c43b9b732f5b7f64a439c4347405_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 137
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["status_code"] ?? $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["status_text"] ?? $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d640d911ee509abe4b96f6e784792dd0e326c43b9b732f5b7f64a439c4347405->leave($__internal_d640d911ee509abe4b96f6e784792dd0e326c43b9b732f5b7f64a439c4347405_prof);

        
        $__internal_eac07ef95bc7d6ff308de557847c73c07077e1f69297dd7b5cc8ceeec524c29c->leave($__internal_eac07ef95bc7d6ff308de557847c73c07077e1f69297dd7b5cc8ceeec524c29c_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_c758a1c068441a66b7cfaf262d28214c0a14fa98094a2cc9fd4616269fc61c47 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c758a1c068441a66b7cfaf262d28214c0a14fa98094a2cc9fd4616269fc61c47->enter($__internal_c758a1c068441a66b7cfaf262d28214c0a14fa98094a2cc9fd4616269fc61c47_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_54d6cccdbe508824cb292a87b3a53f676d8e30db9c31750d4df60122579e4c1a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_54d6cccdbe508824cb292a87b3a53f676d8e30db9c31750d4df60122579e4c1a->enter($__internal_54d6cccdbe508824cb292a87b3a53f676d8e30db9c31750d4df60122579e4c1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 141
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 141)->display($context);
        
        $__internal_54d6cccdbe508824cb292a87b3a53f676d8e30db9c31750d4df60122579e4c1a->leave($__internal_54d6cccdbe508824cb292a87b3a53f676d8e30db9c31750d4df60122579e4c1a_prof);

        
        $__internal_c758a1c068441a66b7cfaf262d28214c0a14fa98094a2cc9fd4616269fc61c47->leave($__internal_c758a1c068441a66b7cfaf262d28214c0a14fa98094a2cc9fd4616269fc61c47_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 141,  217 => 140,  200 => 137,  191 => 136,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "/var/www/html/pictograma-backend/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}
