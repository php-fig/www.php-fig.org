---
title: 'Upgrading PSR interface'
description: >-
    Greetings, PHP. The PHP Framework Interoperability Group is actively looking for feedback on a way to safely update and modernize several existing PSRs. We think this is a workable approach, but before embarking on it we want to get feedback from the broader community. That means you.
date: '2019-10-04T00:00:00.000Z'
categories: []
keywords: []
slug: upgrading-psr-interfaces
tags:
 - php-fig
 - bylaws
author: crell
layout: post
use:
 - authors
 - posts
---

## PHP-FIG wants your help to modernize PSRs!

Greetings, PHP. The PHP Framework Interoperability Group is actively looking for feedback on a way to safely update and modernize several existing PSRs. We think this is a workable approach, but before embarking on it we want to get feedback from the broader community. That means you.

### The problem

PHP-FIG has been publishing PHP interface specifications for years now, from the original [PSR-3 logger interface](https://github.com/php-fig/log) in 2012 to the latest, the [PSR-14 Event Dispatcher interfaces](https://github.com/php-fig/event-dispatcher) this last spring. All of them are, naturally, a product of their time. That is, they were written for the version of PHP that was current at the time they were released.

PHP doesn't stand still, of course, and has added a host of new features in the last several years that could impact specifications. Most notable is the introduction of scalar types and return types in PHP 7.0, and of the `object`, `iterable`, and `void` types since then. (As of this writing it seems likely that we'll get union types in PHP 8, which is squeeeee!)

It would be lovely to be able to include those new types in PHP-FIG interfaces, as that wouldn't change the semantics of the specs at all (they generally are already very specific about what parameter and return types they use) but would make writing a conformant implementation easier and make using a PSR-implementing library easier for everyone.

The challenge, of course, is that technically adding types to an interface is a backward-compatibility (BC) break. That means doing so would immediately require implementers to make a BC break of their own to implement a new typed version of a PSR. While they certainly can, it also then means that an end user then cannot use one library that has adopted the new typed version of a spec and another that uses the old untyped version, because they're incompatible. And since they would share the same class name, a project could not have both installed at the same time. It's an all-or-nothing change, and those tend to be very not-fun. Which means they just wouldn't get used.

### What won't work

Ignoring the internal PHP-FIG process questions for now (as those are largely irrelevant to this discussion), there have been a few ways to go about upgrading specs that have largely been rejected over the years.

1. Just do it: The sledgehammer approach, this would mean ignoring the backward compatibility issues and just releasing a 2.x tag of the interface specs with type hints and a higher PHP minimum version and calling it a day. While certainly the simplest for PHP-FIG, it's not the most viable for the community at large for the reasons described above.
2. Use an alternate namespace: Another proposal has been to version the namespace for upgraded PSRs. For example, the Logger specification (PSR-3) currently uses the `\Psr\Log` namespace. So a fully type-enabled new version would be something like `\Psr\Log\V2`. That has the advantage that it would allow both the old and new version to be installed at the same time. However, it has the disadvantage that a library could not easily support both old and new at the same time, at least not without some tricky bridge-interface inheritance dance. It's doubtful that this would make the upgrade process any easier.
3. The third proposal was recently pushed forward by Stefano Torresi, one of the members of our Core Committee, and it can be summarized in appending a revision number to the PSRs which would match the versions of the corresponding interfaces package, in a way that recalls SemVer; the downside of this approach is that it would change drastically how the PHP-FIG packages are released. You can read about the complete proposal [in Stefano's email to our ML](https://groups.google.com/d/msg/php-fig/OyC3plRYhqg/u03zLMv0BQAJ).

### What we think will work

Recently, Alessandro Lai and Nicolas Grekas pointed out that if we target PHP 7.2 and higher only, we get a new loophole. Here's the huge Twitter thread that sparked a new proposal:

<blockquote class="twitter-tweet"><p lang="en" dir="ltr">Any plans to tag v2 of all PSRs <a href="https://twitter.com/phpfig?ref_src=twsrc%5Etfw">@phpfig</a>, with added type declarations + <a href="https://twitter.com/hashtag/PHP?src=hash&amp;ref_src=twsrc%5Etfw">#PHP</a> &gt;= 7.2? Not having types there is lagging us behind...</p>&mdash; Nicolas Grekas (@nicolasgrekas) <a href="https://twitter.com/nicolasgrekas/status/1174290079105392645?ref_src=twsrc%5Etfw">September 18, 2019</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

[PHP 7.2 introduced limited covariance and contravariance](https://wiki.php.net/rfc/parameter-no-type-variance). In plan terms, it means that, as of PHP 7.2, it's legal to have a class implement an interface and remove type declarations from method parameters (making them "wider", or more permissive) and to add a return type to a method if it doesn't have one defined (making it "narrower", or restricting what can be returned). That opens up the possibility of a two-step upgrade process. The idea would work like this:

* For some existing untyped spec, PHP-FIG releases a v2 of the package that adds parameter type declarations and only parameter type declarations. That version of the package requires PHP 7.2 at minimum.
* PHP-FIG also releases, at the same time, a v3 of the package that adds return types as well.
* An implementing library, in its current version, is automatically compatible with the current v1 of the spec as well as v2, as long as it's running on PHP 7.2 or later. That's because it can safely "drop" the type hints and still be syntactically valid.
* At its leisure, the implementing library can release its own new version, that adds both parameter *and* return types. The v2 of the library is compatible with both v2 and v3 of the spec, because it can safely add a return type relative to the v2 version.
* Alternatively, a library can issue its own two-step release, with a v2 that adds just return types (and thus is compatible with v1 and v2 of the spec) and then later a v3 that adds parameter types as well (and thus is compatible with v2 and v3 of the spec).

This approach preserves the namespace, and provides a transitional period such that existing code can always be compatible with multiple versions of the PSR package. That makes it possible to mix and match the v1 and v2 releases of different libraries that depend on the same PSR, and to mix and match v2 and v3 releases of different libraries that depend on the same PSR. While not a perfect migration path, it's still a far smoother process than any other proposal to date.

It's not a perfect approach, of course. There is still the potential for issues with a library that uses v1 of the spec and has no types that is simply never updated; that library would later on not be able to be used with the v3 of the spec or a v3 version of an implementing library. It also requires libraries to declare a minimum PHP version of 7.2. That said, libraries that are simply never updated at all are called "abandoned" and PHP 7.2 is already the legacy release and will be going into security-only mode in less than 10 weeks, so neither of these seem like major issues.

There is also the fact that even as described the upgrade would not be perfect. Adding explicit types may still have subtle behavioral changes, especially around error handling. We will likely want to fold any interface-impacting errata into the new package versions, which, while they shouldn't have any significant impact, may have subtle edge cases we can't spot in advance. At the same time, this would not allow for any changes to the spec itself; no adding or removing or renaming methods, no matter how much someone may argue for it.

There's also a process question of whether or not these new releases warrant a new PSR number or if we need to define some other process for updating them, but that's "just" a process question and we know that part can be resolved if we're confident in the technical approach.

### Will this work for you?

Before we proceed, we want to put a call out to developers that are implementing existing PSRs, either as implementers of them or consumers. Would this approach work for you? Are there reasons why it would crash and burn? Would you take a 1-release or 2-release approach yourself? (The 2 release approach has a bit more effort but greater cross-compatibility.)

We have set up a short [Google Form to collect feedback](https://docs.google.com/forms/d/e/1FAIpQLSf9q_cdsY00WSZ6fSia9Qq9ErDIeexNzNeEFsfRHd8pTFYF4g/viewform). While input from any PHP developer is welcome, feedback from those directly leveraging PSR interfaces is of the most interest. If that's you, please take a few moments to weigh in on this proposal. Thank you for helping to make PHP better!
