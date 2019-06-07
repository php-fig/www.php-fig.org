---
title: "Summer updates from PHP-FIG: June, July &\_August"
description: >-
  This time we have waited a bit longer before publishing a recap of the recent
  news from PHP-FIG, but we have a lot to share; let’s start! During this three
  months period, PSR-17 went from draft to…
date: '2018-09-05T16:03:48.342Z'
categories: []
keywords: []
slug: summer-updates-from-php-fig-june-july-august
tags:
  - php-fig
  - psr
author: alessandrolai
layout: post
use:
  - authors
  - posts
---

This time we have waited a bit longer before publishing a recap of the recent news from PHP-FIG, but we have a lot to share; let’s start!

![The new official page for PSR-17](/img/blog/1__8xZ8Nbd____IOnDMZKwyvRwA.png)
The new official page for PSR-17

#### PSR-17: message factories

During this three months period, PSR-17 went from draft to **approved**! This new standard recommendation is related to the HTTP messages world, and it constitutes “a common standard for **factories** that create [PSR-7](https://www.php-fig.org/psr/psr-7/) compliant HTTP objects”. This is another piece of the puzzle to increase interoperability between HTTP clients and/or frameworks in the PHP world; the spec is now published on Packagist, and already has a [non-trivial number of implementors](https://packagist.org/packages/psr/http-factory/dependents).

#### PSR-18: HTTP client

Another HTTP-related PSR which is in the works is PSR-18, which is about HTTP clients. Tobias talked about it in [our previous story](https://medium.com/php-fig/the-http-client-psr-9c2535132980), and in the meantime the working group has pushed for a readiness vote, and [now the spec is on the review phase](https://groups.google.com/d/topic/php-fig/dV9zIaOooZ4/discussion).

#### Election results

The most recent piece of news is the August election, since we had two Secretaries and four Core Committee seats to be filled or renewed.

For the secretaries, I (**Alessandro Lai**) got confirmed for another term, and we got onboard a new one, **Ian Littman**; for the CCs, the three standing members (**Cees-Jan Kiewiet**, **Lukas Kahwe Smith**, **Samantha Quiñones**) got confirmed, and the vacant seat has been filled by **Chuck Burgess**. Congratulations to you all!

#### PSR-14: event dispatcher

Last but not least, one of the most active working group right now is the PSR-14 one, which revolves around event dispatching.

The group is working at a great pace on the spec, and Larry Garfield (the editor) has posted numerous times on our mailing list with [recaps of their work](https://groups.google.com/d/topic/php-fig/mcSml-oIbGk/discussion). The spec has already taken form [on GitHub](https://github.com/php-fig/event-dispatcher), and the group’s members have produced a few working implementation to flesh it out.
