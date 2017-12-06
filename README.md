www.php-fig.org
---------------

This is the source for [www.php-fig.org][site]. It is a static site generated with
[Sculpin][sculpin].

 [site]:    http://www.php-fig.org
 [sculpin]: https://sculpin.io


Contributing
============

 - If you notice something missing, please [open an issue on GitHub][issue].

 - If you'd like to fix it yourself, simply [edit the file on GitHub][edit] and
    open a pull request. The site will be recompiled as soon as your pull
    request is merged.

 - If you'd like to run the site locally o generate the HTML files, you'll need to install the dependencies.  
    The templates are built by directly including the Markdown sources from the [fig standards repo][fig-standards], which is provided as a git submodule.  
    Also, while this site was ported over from [Jekyll][jekyll] to use PHP, some Ruby dependencies are still present. This will probably change in the future.

    [issue]: https://github.com/php-fig/php-fig.github.com/issues
    [edit]:  https://github.com/blog/905-edit-like-an-ace
    [fig-standards]: https://github.com/php-fig/fig-standards
    [jekyll]: https://github.com/mojombo/jekyll


Clone
------
Note the `--recursive` flag to clone the submodule too.
```bash
git clone --recursive https://github.com/php-fig/php-fig.github.com
```

Install
-------
```bash
gem install bundler
bundle install --path vendor
composer install
```

Compile
-------
```bash
vendor/bin/sculpin generate
bundle exec sass source/_sass/all.scss:output_dev/css/all.css
```

Run
-------
```bash
vendor/bin/sculpin serve
```


