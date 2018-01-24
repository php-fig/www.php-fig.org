www.php-fig.org
---------------

This is the source for [www.php-fig.org][php-fig.org]. It is a static site generated with
[Sculpin][sculpin].

 [php-fig.org]: http://www.php-fig.org


# Contributing

 - If you notice something missing, please [open an issue on GitHub][issue].

 - If you'd like to fix it yourself, simply [edit the file on GitHub][edit] and
    open a pull request. The site will be recompiled as soon as your pull
    request is merged.

 - If you'd like to run the site locally o generate the HTML files, you'll need to install the dependencies.  
    The templates are built by directly including the Markdown sources from the [fig standards repo][fig-standards], which is provided as a git submodule.  

    [issue]: https://github.com/php-fig/php-fig.github.com/issues
    [edit]:  https://github.com/blog/905-edit-like-an-ace
    [fig-standards]: https://github.com/php-fig/fig-standards


## Clone
Note the `--recursive` flag to clone the submodule too.
```bash
git clone --recursive https://github.com/php-fig/php-fig.github.com
```


## Install

While the project was ported from [Jekyll][jekyll] to [Sculpin][sculpin] to use PHP, some Ruby dependencies are still present. This will probably change in the future.
    
```bash
gem install bundler
bundle install --path vendor
composer install
```

  [jekyll]: https://github.com/mojombo/jekyll
  [sculpin]: https://sculpin.io


## Build

A script is provided to run all the main tasks at once.

```bash
bin/build.sh
```


## Run

```bash
vendor/bin/sculpin serve
```


## Using Docker

A multistage `Dockerfile` is provided, in case you want to build and/or run everything without installing any dependency whatsoever:

```bash
docker build . -t fig-website
docker run --rm -p 80:80 fig-website
```

The final image is a simple NGINX instance, however you can use the `build` target with an interactive shell to access a fully provisioned PHP+Ruby environment:

```bash
docker build . --target build -t fig-website-build
docker run --rm -ti fig-website-build sh
```
