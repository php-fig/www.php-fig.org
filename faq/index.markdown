---
layout: default
title:  FAQ — PHP-FIG
---
# PHP-FIG FAQ
	

## What does FIG stand for?

The FIG stands for Framework Interoperability Group. The name until recently was
“PHP Standards Group” but this was somewhat inaccurate of the intentions of the
group.


## What are the aims of the PHP-FIG?

The idea behind the group is for project representatives to talk about the
commonalities between our projects and find ways we can work together. Our main
audience is each other, but we’re very aware that the rest of the PHP community
is watching. If other folks want to adopt what we’re doing they are welcome to
do so, but that is not the aim. Nobody in the group wants to tell you — Joe
Programer — how to build your application.


## What standards have been passed so far?

<dl>
	<dt><a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md">PSR-0</a></dt> 
	<dd>Aims to provide a standard file, class and namespace convention to allow plug-and-play code.</dd>
	<dt><a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md">PSR-1</a></dt> 
	<dd>Aims to ensure a high level of technical interoperability between shared PHP code.</dd>
	<dt><a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md">PSR-2</a></dt>
	<dd>Provides a Coding Style Guide for projects looking to standardise their code.</dd>
</dl>


## Who appointed you to make these decisions?

The group was bootstrapped by a number of framework developers at php|tek in 2009. 
Since then various other members have applied and been voted in, increasing the size
of the group from the first 5 to over 20.

It may not be an “official” PHP group, but if that was the case who would do the appointing? 
The FIG represents a cross-section of the community, and over time that cross-section 
will represent a wider selection of projects.

## Who are these voting members?

The full list of voting members can be seen [here](https://github.com/php-fig/fig-standards#voting-members)


## Do voting members have to comply to the standards?

No. Becoming a voting member on the PHP-FIG in no way forces a member or project
to implement every - or any - accepted PSRs. Projects have to consider backwards-
compatibility issues when upgrading and make the changes at the right time, so it 
is assumed most projects will eventually adopt, but it is not a requirement.


## Can I get involved?

Absolutely. Anybody who subscribes to the Google Group is part of the PHP-FIG. 
As soon as you subscribe to the [mailing list][mailing] you are a PHP-FIG Community Member, who
can influence standards, make suggestions, give feedback, etc. Only PHP-FIG Voting 
Members can start or participate in votes, but the discussion and formation stages 
involved everyone.

  [mailing]: http://groups.google.com/group/php-fig/


## Should I contact my representative to get involved?

If you think that your project would benefit from implementing PSRs and you want
to have a say in the development of future standards then you certainly should
get involved.


## Who gets the vote — the individual or the framework/project?

Multiple members can represent a single project, but that project will only get
one vote. A member can represent multiple projects, but that member will still
only get one vote.


## Who should initiate/close voting?

The rules are all described in the [Voting Protocol Bylaws][bylaws].

 [bylaws]: https://github.com/php-fig/fig-standards/blob/master/bylaws/001-voting-protocol.md


## Why has [FRAMEWORK X] not been voted into the group?

Every single vote has a number of reasons for and against voting. No explicit
guideline or explicit set of rules has been set out. Some vote for everyone,
some vote for their friends, some vote for projects with a certain size or
reputation. In reality sizes of all projects have been accepted from the large
and extremely well known (Zend Framework 2 & Drupal) to the considerably smaller
([PyroCMS](http://pyrocms.com/)). If a project you use is not represented they
have either not applied, or were not involved enough in discussion prior to
submitting their vote that they have not been voted in. They can try again at a 
later date, of course.


## Why are there non-frameworks as voting members?

It was quickly discovered that CMS, applications, package developers, etc. have
as much to add as the frameworks themselves. The idea is to get a cross-section
of the ecosystem and not JUST one specific group of developers. Having the
implementors working alongside the people creating packages and the people
developing systems with the frameworks are all of equal importance.


## I use [FRAMEWORK X] which is a voting member, yet I’ve never heard about the PHP-FIG until now. How are they representing their community?

Framework developers have a multitude of factors to consider when planning the
roadmap for their products and they need to take their community into account
when they do this. Factors like features, functionality, style guide, minimum
requirements, etc. are all subject to change in any new version and each project
makes their own decisions. How they involve their communities in decision making
is entirely up to them, not the FIG.
