---
title: "Updates from PHP-FIG: September &\_October"
description: >-
  Another two months are passed, and here we are with a new recap of what
  happened inside the PHP-FIG. Let’s dive in! At the last moment of October, a
  new PSR has been accepted! This time it’s PSR-18…
date: '2018-11-06T15:22:50.408Z'
categories: []
keywords: []
slug: updates-from-php-fig-september-october
tags:
  - php-fig
author: alessandrolai
layout: post
use:
  - authors
  - posts
---

Another two months are passed, and here we are with a new recap of what happened inside the PHP-FIG. Let’s dive in!

#### PSR-18: HTTP client

At the last moment of October, **a new PSR has been accepted**! This time it’s [PSR-18](https://www.php-fig.org/psr/psr-18/), which is about HTTP clients! With this PSR we have now [a common interface](https://github.com/php-fig/http-client/blob/master/src/ClientInterface.php) for classes that send HTTP requests, which will make a lot easier writing libraries agnostic to which client is used underneath.

We also took advantage of this change to refresh the homepage of our site, splitting the list of PSRs in a new group dedicated to HTTP, which now counts four different standard recommendations: 7, 15, 17 & 18. Take a look!

![Http message interfaces](/img/blog/1__8gQ2YWWgZik6Mb7EIwj13g.png)

#### PHPDoc back on track

Finally we were able to recover PSR-5 from the _abandoned_ state; **Chuck Burgess** took over as editor, and decided to push for splitting PSR-5 in two: the [new PSR-19](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc-tags.md) will be a tag catalog, to list all the valid tags that the PHP-FIG will recognize and standardize, and the old [PSR-5](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md) will take care only of PHPDoc format, not content.

With an [unanimous entrance vote](https://groups.google.com/d/topic/php-fig/5Yd0XGd349Q/discussion) we formed a dedicated working group, and since then they’ve [already started working](https://github.com/php-fig/fig-standards/pulls?q=is%3Apr+is%3Aopen+label%3A%22PSR-5+%2B+PSR-19%3A+PHPDoc%22) on pulling back changes from past work and creating a baseline from which start from scratch. Good luck to them!

#### PSR-14 proceeds

In the meantime, the working group of the Event Manager PSR is still tinkering on their proposal; in the latest weeks they got a ton of feedback, in particular from [Symfony’s Core Contributor Nikolas Grekas](https://groups.google.com/d/topic/php-fig/YdqZsagmLqU/discussion). They are probably nearing the review period, and just trying to mediate the different suggestions from future adopters of PSR-14.
