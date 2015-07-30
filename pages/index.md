---
layout: default
permalink: /
title:  PHP-FIG — PHP Framework Interop Group
disable_page_banner: true
---

<div class="home_banner">
    <div class="center">
        <div class="home_banner__content">
            <h1 class="home_banner__title">Moving PHP forward through collaboration and standards.</h1>
            <p class="home_banner__intro">Welcome the PHP Framework Interop Group! We're a group of established PHP projects whose goal is to talk about commonalities between our projects and find ways we can work better together.</p>
            <div class="home_banner__links">
                <a class="home_banner__link" href="/psr/">View recommendations</a>
                <a class="home_banner__link" href="/faqs/">Frequently asked questions</a>
            </div>
        </div>
    </div>
</div>

{% capture autoloading_code %}
~~~php
<?php

use Vendor\Package\ClassName;

$object = new ClassName();
~~~
{% endcapture %}

{% capture interfaces_code %}
~~~php
<?php

namespace Psr\Log;

/**
 * Describes a logger instance
 */
interface LoggerInterface
{
~~~
{% endcapture %}

{% capture coding_styles_code %}
~~~php
<?php

namespace Vendor\Package;

class ClassName
{
    public function fooBarBaz($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
~~~
{% endcapture %}

<div class="home_features">
    <ul class="home_features__list">
        <li class="home_features__item home_features__item--autoloading">
            <div class="center">
                <div class="home_features__content">
                    <h2 class="home_features__title">Autoloading</h2>
                    <p class="home_features__description">Interoperable PHP autoloaders that map namespaces to file system paths, and that can co-exist with any other SPL registered autoloader.</p>
                </div>
                <div class="home_features__editor">
                    <div class="home_features__chrome">
                        <div class="home_features__chrome_dot"></div>
                        <div class="home_features__chrome_dot"></div>
                        <div class="home_features__chrome_dot"></div>
                    </div>
                    <code class="home_features__code">
                        {{ autoloading_code | markdownify }}
                    </code>
                </div>
            </div>
        </li>
        <li class="home_features__item home_features__item--interfaces">
            <div class="center">
                <div class="home_features__content">
                    <h2 class="home_features__title">Interfaces</h2>
                    <p class="home_features__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="home_features__editor">
                    <div class="home_features__chrome">
                        <div class="home_features__chrome_dot"></div>
                        <div class="home_features__chrome_dot"></div>
                        <div class="home_features__chrome_dot"></div>
                    </div>
                    <code class="home_features__code">
                        {{ interfaces_code | markdownify }}
                    </code>
                </div>
            </div>
        </li>
        <li class="home_features__item home_features__item--coding_styles">
            <div class="center">
                <div class="home_features__content">
                    <h2 class="home_features__title">Coding Styles</h2>
                    <p class="home_features__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="home_features__editor">
                    <div class="home_features__chrome">
                        <div class="home_features__chrome_dot"></div>
                        <div class="home_features__chrome_dot"></div>
                        <div class="home_features__chrome_dot"></div>
                    </div>
                    <code class="home_features__code">
                        {{ coding_styles_code | markdownify }}
                    </code>
                </div>
            </div>
        </li>
    </ul>
</div>