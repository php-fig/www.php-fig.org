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

    [issue]: https://github.com/php-fig/www.php-fig.org/issues
    [edit]:  https://github.com/blog/905-edit-like-an-ace
    [fig-standards]: https://github.com/php-fig/fig-standards


## Clone
Note the `--recursive` flag to clone the submodule too.
```bash
git clone --recursive https://github.com/php-fig/www.php-fig.org
```


## Install

While the project was ported from [Jekyll][jekyll] to [Sculpin][sculpin] to use PHP, some Ruby dependencies are still present. This will probably change in the future.

```bash
bin/install.sh
```

will install both PHP Composer packages and Ruby bundled gems.

  [jekyll]: https://github.com/mojombo/jekyll
  [sculpin]: https://sculpin.io


## Build

```bash
bin/build.sh
```

will compile the sources into `output_dev`.


## Run

```bash
vendor/bin/sculpin serve
```


## Using Docker

A multistage `Dockerfile` is provided, in case you want to build and/or run everything without installing any dependency whatsoever. Docker version 17.09.0-ce or newer is required.

The final image is a simple NGINX instance:

```bash
docker build . -t fig-website
docker run --rm -p 80:80 fig-website
# browse the website at http://localhost
```

However, you can use the `dev` target, which provides an interactive terminal to access a fully provisioned PHP+Ruby environment.

If you want to develop in the Docker runtime, you'll have mount the project root as a volume, expose port 8000, explicitly run the install/build process, and run the PHP built-in server:

```bash
docker build . --target dev -t fig-website-dev
docker run --rm -ti -p 8000:8000 -v $PWD:/fig-website fig-website-dev
# inside the container terminal
install.sh
build.sh
sculpin serve
```

Note that:
 - inside the container, relevant executables are in the global `PATH`
 - the container is executed with user and group with id `1000` by default, which will likely match your main host user. You can change the id via the `UID` and `GID` build-time variables (`--build-arg`).
