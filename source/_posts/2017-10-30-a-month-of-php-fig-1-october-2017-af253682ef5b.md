---
title: "A month of PHP-FIG #1: October\_2017"
description: >-
  As part of the effort to communicate better what’s going on within the PHP-FIG
  we’re starting a new series of ‘A month of PHP-FIG’ articles to be released
  towards the end of each month, each being a…
date: '2017-10-30T14:52:59.272Z'
categories: []
keywords: []
slug: a-month-of-php-fig-1-october-2017
tags:
  - php-standard
  - standard
  - php-fig
author: michaelcullumuk
layout: post
use:
  - authors
  - posts
---

As part of the effort to communicate better what’s going on within the PHP-FIG we’re starting a new series of ‘A month of PHP-FIG’ articles to be released towards the end of each month, each being a 2 minute read or less.

![Github screenshot](/img/blog/1__Zi1MOUQmtRXs3y7mhCLnGA.png)

This month has been a busy month for the PHP-FIG. We’ve kickstarted a couple of PSRs with PSR-12¹ being [formally re-introduced into the draft stage](https://groups.google.com/forum/#!topic/php-fig/Luk-F3x6T2g); internally we’ve started the voting for the [secretary elections](https://groups.google.com/forum/#!topic/php-fig/KwarBrWfsSs) for two secretary posts; and lots of ideas have been flowing to try and get a number of PSRs moving again.

### Discussion / PSR Updates

*   PSR-12¹ has come forward for an entrance vote as a matter of formality as is nearing completion but needs a formal Working Group post-FIG 3.0 transition. [Link](https://groups.google.com/forum/#!topic/php-fig/Luk-F3x6T2g)
*   There was a discussion as to whether or not new PSRs should require PHP 7 or PHP 5 still. The consensus was it should be based on individual circumstances of a PSR. [Link](https://groups.google.com/forum/#!topic/php-fig/DknNTZumojM)
*   It was agreed that PSR-18² will not cater to async http client requests due to the lack of a Promise PSR standard. [Link](https://github.com/php-fig/fig-standards/pull/942)
*   Some solid ideas have come up for how PSR-9³ and PSR-10⁴ could be used by Composer.

### New PSR Ideas

This month, due to a number of discussions, particularly some person at SymfonyLive San Francisco, there have been a huge number of new PSR ideas being floated.

*   **Internationalisation** ([Oscar Otero](https://medium.com/@misteroom))  
    An interface to be able to use the same translations in different libraries e.g template engines. This will likely hit the mailing list to form a WG within a few days.
*   **Cache Tagging** ([Tobias Nyholm](https://medium.com/@tobias.nyholm) & [Nicolas Grekas](https://medium.com/@nicolas.grekas))  
    An interface for interacting with PSR-6⁵/16⁶ cache items’ tags.
*   **Interface for State Resettable classes** ([Nicolas Grekas](https://medium.com/@nicolas.grekas))  
    The ability to reset the state on classes and having an interfaced method that can be called to provide this functionality
*   **Deprecations** ([Nicolas Grekas](https://medium.com/@nicolas.grekas))  
    For handling deprecations of classes and methods to trigger errors/notifications
*   **Auto-updates** (@mlh407 — Michael Hess)  
    A number of ideas have surfaced relating to the automatic updates space relating to the signing/verification of tags & releases.
*   **Container & Dependency Injections Future PSRs**([Nicolas Grekas](https://medium.com/@nicolas.grekas), [Matthieu Napoli](https://medium.com/@mnapoli), & David Negrier)  
    A number of potential PSRs relating to what’s next for container and dependency injection interoperability.

If you’d like to know more about any of these, get involved, they are relevant to your project or you think you have specialist knowledge on any of these topics, please contact myself ([Michael Cullum](https://medium.com/@michaelcullumuk)) or the Editor/Suggester mentioned.

\[1\]: PSR-12: Extended Coding Style Guide.  
\[2\]: PSR-18: HTTP Client  
\[3\]: PSR-9: Security Advisories  
\[4\]: PSR-10: Security Reporting Process  
\[5\]: PSR-6: Cache Interface  
\[6\]: PSR-16: Simple Cache Interface
