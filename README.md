www.php-fig.org
---------------

This is the source for [www.php-fig.org][site]. It is automatically compiled by
[Jekyll][jekyll] every time a pull request is merged.

 [site]:   http://www.php-fig.org
 [jekyll]: https://github.com/mojombo/jekyll


Contributing
============

 1. If you notice something missing, please [open an issue on GitHub][issue].

 2. If you'd like to fix it yourself, simply [edit the file on GitHub][edit] and
    open a pull request. The site will be recompiled as soon as your pull
    request is merged.

 3. If you'd like to test things out locally, you'll need to install Jekyll and
    a markdown engine:
     
    ```bash
    gem install bundler
    bundle install
    ```

    Then compile!

    ```bash
    bundle exec jekyll serve
    ```

    ... and open `http://localhost:4000` in your browser to check it out!


Important: if you have this problem like in Windows: Liquid Exception: incompatible character encodings: UTF-8 and IBM437
Just type: chcp 65001
Done. Hope this can help some people

 [issue]: https://github.com/php-fig/php-fig.github.com/issues
 [edit]:  https://github.com/blog/905-edit-like-an-ace
