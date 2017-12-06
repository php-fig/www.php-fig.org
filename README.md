www.php-fig.org
---------------

This is the source for [www.php-fig.org][site]. It is a static site generated with
[Sculpin][sculpin].

 [site]:    http://www.php-fig.org
 [sculpin]: https://sculpin.io


Contributing
============

 1. If you notice something missing, please [open an issue on GitHub][issue].

 2. If you'd like to fix it yourself, simply [edit the file on GitHub][edit] and
    open a pull request. The site will be recompiled as soon as your pull
    request is merged.

 3. If you'd like to run the site locally o generate the HTML files, you'll need to install the dependencies.  
    While this site was ported over from [Jekyll][jekyll] to use PHP, since the FIG is a PHP related project, some Ruby dependencies are still present. This will probably change in the future.
     
    Install:
    ```bash
    gem install bundler
    bundle install --path vendor
    composer install
    ```

    Compile:
    ```bash
    vendor/bin/sculpin generate
    bundle exec sass source/_sass/all.scss:output_dev/css/all.css
    ```
    
    Serve:
    ```bash
    vendor/bin/sculpin serve
    ```

 [issue]: https://github.com/php-fig/php-fig.github.com/issues
 [edit]:  https://github.com/blog/905-edit-like-an-ace
 [jekyll]: https://github.com/mojombo/jekyll
