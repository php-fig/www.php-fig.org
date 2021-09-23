www.php-fig.org
---------------

This is the source for [www.php-fig.org][php-fig.org]. It is a static site generated with
[Sculpin][sculpin].

 [php-fig.org]: https://www.php-fig.org
 [sculpin]: https://sculpin.io/


# Contributing

 - If you notice something missing, please [open an issue on GitHub][issue].

 - If you'd like to fix it yourself, simply [edit the file on GitHub][edit] and
    open a pull request. The site will be recompiled in preview as soon as open it.

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

## Install and run
The project leverages `make` and [Docker Compose](https://docs.docker.com/compose/) to automate the local environment, so they are required.

Once you have them installed, you can simply type `make` and the whole site will be built and put on "watch mode", for both PHP and SASS/CSS.
You'll then be able to access the site at `localhost:8000`.

Additionally, you can run `make html-proofer` to run the same checks that are run during the deploy process. Look into `Makefile` for additional useful targets. 

Note that:
- you can open a shell inside the PHP container with `make shell`
- inside the PHP container, relevant executables are in the global `PATH`
- the containers are executed with user and group with id `1000` by default, which will likely match your main host user. You can change the id via the `UID` and `GID` build-time variables; you can configure those locally creating a `docker-compose.override.yml` (which is ignored by Git) containing:
```yaml
version: '3.5'

services:
  php:
    build:
      args:
        # your custom IDs
        UID: 1234
        GID: 5678
```

## Updating the submodule
This site uses the master branch of the [main PHP-FIG repository](https://github.com/php-fig/fig-standards) as a Git submodule to pull content from it. 
If you need to update it, you can use the `bin/update_submodule.sh` script to pull new commits. Afterwards, you can commit the differences in this repo, to push the updates afterwards.

## Using Xdebug
If you need to debug the site build, you can enable Xdebug. To do it, you need to copy `docker-compose.override.dist.yml` as `docker-compose.override.yml` so that your local Docker Compose configuration loads that configuration. This (after a container reload) will put Xdebug in `debug` mode. Once done that, you need to configure your IDE to catch to that. Xdebug will automatically connect back your host system thanks to the `host.docker.internal` special hostname, with a serverName of `PHP-FIG`, as defined in `docker-compose.yml`.
