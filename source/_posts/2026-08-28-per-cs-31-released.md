---
title: 'PER-CS 3.1 released'
date: '2026-08-28T00:00:00.000Z'
categories: []
keywords: []
slug: per-cs-31-released
tags:
 - php-fig
 - per-cs
author: crell
layout: post
use:
 - authors
 - posts
---

The PHP-FIG Coding Standard Working Group (there's a mouthful) is happy to announce the release of the PER-CS 3.1 coding standards guidelines.

This is a modest addition to the previous 3.0 release to cover language features added since 3.0 was published.  Largely, that just means catching up with PHP 8.5.  There are also some clarifications and cleanup in the language in a few places.

Of particular note:

* Pipe operator usage is now defined.
* Empty closures should be single-lined, with the arrow-style preferred.
* The coding guidelines now say to avoid certain fringe syntax styles that have been deprecated by PHP and will be going away eventually anyway.  Best to get a jump on it.

The full [migration guide](https://www.php-fig.org/per/coding-style/meta/migration-3.1/) is available, with deep links to all the changes, and the [full spec](https://www.php-fig.org/per/coding-style/) is available on the website as well.

At the moment, it looks like PHP 8.6 won't include anything new that necessitates a new release.  We may work on some cleanup and clarification in the meantime, but don't expect any dramatic new releases in the near future.

Happy Coding!
