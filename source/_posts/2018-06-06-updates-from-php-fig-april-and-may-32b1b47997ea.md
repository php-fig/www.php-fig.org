---
title: "Updates from PHP-FIG: April and\_May"
description: >-
  Here we are again, with another bi-monthly update about the state of the
  affairs here at PHP-FIG. In the last two months, two PHP-FIG meetups where
  held, during the PHPDay (Verona, Italy) and…
date: '2018-06-06T16:50:10.742Z'
categories: []
keywords: []
slug: updates-from-php-fig-april-and-may
tags:
  - php-fig
  - php-development
author: alessandrolai
layout: post
use:
  - authors
  - posts
---

Here we are again, with another bi-monthly update about the state of the affairs here at PHP-FIG. In the last two months, two PHP-FIG meetups where held, during the [PHPDay (Verona, Italy)](https://2018.phpday.it/) and [PHP\[tek\] (Atlanta, US)](https://tek.phparch.com/) conferences.

![PHP-FIG stickers, shared at the PHPDay front desk](/img/blog/1__RTnGfyj7sZVVHFhmhga7OQ.jpeg)
PHP-FIG stickers, shared at the PHPDay front desk

#### Vacant seat as secretary

Unfortunately, Mark Railton recently [announced his decision](https://groups.google.com/forum/#!topic/php-fig/bpSHS0EMUD0) to step down from his role as secretary of the PHP-FIG, due to insufficient time to perform his duties.

Next elections will be held this August, so we ask that anyone willing to help step forward and ask for a nomination in those elections. Don’t worry, it’s an easy task!

Please reach out to the [active secretaries or to any PHP-FIG Core Committee member](https://www.php-fig.org/personnel/) to inquire further.

#### PSR-5: changes in progress

There is still preparation work in progress on the PHPDoc PSR. We haven’t held the entrance vote yet, because the forming working group has [decided to split the scope into two separate PSRs](https://github.com/php-fig/fig-standards/pull/1038). They will be creating a new one as a “tag catalog”, and the original PSR-5 will focus on format only.

#### PSR-9 and PSR-10: security, revamped

In the meantime, two other abandoned PSRs about security practices are being recovered: PSR-9, which is about **security advisories** of vulnerable packages, and PSR-10, which is about standardizing the **security vulnerabilities reporting** process.

The effort is led by Michael Cullum as the new editor of both PSRs. [His call to action](https://groups.google.com/forum/#!topic/php-fig/OgLlv9QEjqk) has attracted many professionals with “skin in the game” of securing PHP web applications. If you are a security professional, security lead or other security figure and are wanting to get involved, reach out to Michael about joining the working group.

#### Addressing feedback about PSR-12

PSR-12, the updated coding style guide, is in progress too.The working group has decided to go back to the draft stage to **address the concerns** rasied during review, and apply some changes to the spec. Once that’s complete, the PSR will be back in the review phase.

![The PHP-FIG meetup at PHPDay 2018](/img/blog/1__Ogviiaz4JPUBLJA7SZhBIA.jpeg)
The PHP-FIG meetup at PHPDay 2018

#### Drafting PSR-14: Event Dispatcher

Another PSR which is under heavy development is PSR-14, the Event Dispatcher one. The working group is proceeding with PRs and trying to shape a few prototypes to see if the spec holds up when put down in code.

The draft for now looks vaguely like the Symfony event manager, but they are also looking at Node for some elements that could be helpful in developing a complete spec.

#### HTTP specs: PSR-17 (factories) and PSR-18 (clients)

Both PSR-17 and PSR-18 are **almost ready to progress into the review phase**.

The **factories** spec has been cleaned up and [removed inheritance from the proposed interfaces](https://github.com/php-fig/fig-standards/pull/1036); the working group decided to address developer experience issues later in a -util package that would accompany the spec at the release; the spec is currently [under vote to reach the review phase](https://groups.google.com/forum/#!topic/php-fig/2EjKzE-7Yn8).

**PSR-18** is held back by a possible issue in interface inheritance that has a strange behavior at the language level, but it will be addresses as soon as possible. This PSR should be ready to reach the review phase immediately after.

PSRs references:

*   [PSR-5: PHPDoc](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md)
*   [PSR-9: security reporting process](https://github.com/php-fig/fig-standards/blob/master/proposed/security-reporting-process.md)
*   [PSR-10: security disclosure publication](https://github.com/php-fig/fig-standards/blob/master/proposed/security-disclosure-publication.md)
*   [PSR-12: Extended Coding Style Guide](https://github.com/php-fig/fig-standards/blob/master/proposed/extended-coding-style-guide.md)
*   [PSR-14: Event Dispatcher](https://github.com/php-fig/fig-standards/blob/master/proposed/event-dispatcher.md)
*   [PSR-17: HTTP factories](https://github.com/php-fig/fig-standards/blob/master/proposed/http-factory/http-factory.md)
*   [PSR-18: HTTP clients](https://github.com/php-fig/fig-standards/blob/master/proposed/http-client/http-client.md)
