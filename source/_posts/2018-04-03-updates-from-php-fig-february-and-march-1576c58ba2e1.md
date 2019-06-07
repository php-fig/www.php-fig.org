---
title: "Updates from PHP-FIG: February and\_March"
description: >-
  Continuing in our habit of frequent posts to update the community, here we are
  to see what happened inside the PHP-FIG in the last two months. As we said in
  the last update, we are in the process of…
date: '2018-04-03T13:07:50.601Z'
categories: []
keywords: []
slug: updates-from-php-fig-february-and-march
tags:
  - php-fig
  - php-development
author: alessandrolai
layout: post
use:
  - authors
  - posts
---

![The PSR-6 amendment pull request](/img/blog/1__NX38BGDhuoRqXuCDLQnGYA.png)

Continuing in our habit of frequent posts to update the community, here we are to see what happened inside the PHP-FIG in the last two months.

### PSR-5: PHPDoc take two

As we said in the last update, we are in the process of recovering [PSR-5](https://github.com/phpDocumentor/fig-standards/blob/master/proposed/phpdoc.md), the proposed standard for PHPDoc. Chuck Burgess is willing to act as the editor, and Gary Hockin already volunteered as a CC sponsor. We still need a few other persons to create the Working Group, so please reach out to Chuck or to one of the secretaries if you are interested!

### PSR-6 amendment

Since a long time ago, [a PR was opened](https://github.com/php-fig/fig-standards/pull/915/files) to fix a small issue in the Caching Interface standard, PSR-6. Since the topic was a bit controversial, that remained blocked, but we finally reached consensus and voted the amendment in! Thanks to Larry Garfield for pushing this through the finish line.

### HTTP message standards are still worked on

Following the approval of [PSR-15](https://www.php-fig.org/psr/psr-15/), the standard recommendation for HTTP Server Request Handlers, Matthew Weier O’Phinney started a vote to get **PSR-17 back on track and in the draft stage**; the standard is about [HTTP Factories](https://github.com/php-fig/fig-standards/tree/master/proposed/http-factory/).

T[he vote was unanimously in favor](https://groups.google.com/forum/?fromgroups#!topic/php-fig/A5mZYTn5Jm8), he will be acting as a sponsor, the editor of the PSR will be Woody Gilk, and the rest of the Working Group will be composed by Stefano Torresi, Matthieu Napoli, Korvin Szanto, Glenn Eggleton, Oscar Otero, and Tobias Nyholm.

In the meantime, [PSR-18 (HTTP clients)](https://github.com/php-fig/fig-standards/tree/master/proposed/http-client/) is also in the draft stage and currently worked on. The working group is evaluating the upgrade path for HTTPlug to this standard, since it’s one of the most used abstraction library for HTTP Clients in PHP, and it would make a great test for the spec.
