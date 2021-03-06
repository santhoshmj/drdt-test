# DRDT

## Purpose

The main goal of the DRDT project is "to develop a performance-oriented website that’s fast, stable, scalable and low-maintenance". Here are the details of those four attributes:

**Fast** - Website needs to be fast both in the frontend and in the backend. Things should be as fast as possible for ALL the stakeholders (visitors, product owners, QA, dev, etc).

**Stable** - What's working should keep working, not break by accident.

**Scalable** - Project must be able to scale vertically (adding new features to existing sites) and horizontally (applying a subset of the existing features to new sites) with minimal effort.

**Low-maintenance** - Control of the product should be in hands of its owners. Developers' role is to enable POs to achieve their goals, not to block them. Reduce dev involvement over time.

Incidentally, the resulting website should match www.constructionprotips.com in terms of look and feel, and functionality. 

---

This repository provides a local WordPress development environment and a CI/CD workflow with the following features:
* Automatic deployments to [Pantheon](https://pantheon.io) (with one environment per Pull Request using Multidev)
* Local development environment with [Lando](https://docs.devwithlando.io/)
* Asset compilation with [gulp](https://gulpjs.com/)
* PHP dependency management with [Composer](https://getcomposer.org/)
* Build and testing processes run on [CircleCI 2.0](https://circleci.com/)
* Unit tests with [PHP Unit](https://phpunit.de/)
* [Behat](http://behat.org/en/latest/) testing with [WordHat](https://github.com/paulgibbs/behat-wordpress-extension/)
* Enforced [WordPress coding standards](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards) with [PHP code sniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* Performance testing with [Lighthouse](https://developers.google.com/web/tools/lighthouse/)
* Visual regression testing with [BackstopJS](https://github.com/garris/BackstopJS/)


## Local Development

Local environment is provided by [Lando](https://docs.devwithlando.io/). It requires Linux with kernel 4.x or higher, macOS 10.11 (El Capitan) or newest, or Windows 10 Pro+.
If your system doesn't meet the minimum requirements, a Vagrant machine is also available. Take a look at [the README](drdt-vagrant/README.md), and instead of prefixing the commands here with `lando`, run them inside the VM.

### First-time setup
* Install [Lando](https://docs.devwithlando.io/) if not already installed
* Fork this repository, and clone your fork to your local machine.
* Use `lando start` and `lando stop` to start and stop the local development environment.
* Download and install dependencies dependencies. This can be done through Lando with the commands below:
** `lando composer-install`
** `lando gulp-build`
* Get a copy of the database and files from the Pantheon dashboard (or ask for one). Import the DB with `lando db-import` and put the files in `web/wp-content/uploads`.
* Create a local admin user: `lando wp user create admin your-email@example.com --role=administrator --user_pass=admin`
* Visit your site at https://drdt.lndo.site

### Directory structure
The project structure is similar [Bedrock](https://roots.io/bedrock/)'s. You'll find WordPress source files in the `web` directory.

Main theme directory is in `web/wp-content/themes/bumblebee`.

Third party plugins should be installed using Composer (and [WordPress Packagist](https://wpackagist.org/)).

**Note:** At the moment, all plugins in `wp-content/plugins` will go through PHPCS, and are manually added to the ignored folders for PHPCS. If you can automate this, please send a Pull Request!

### Updates and file changes
* `lando composer update` will need to be ran after any changes to `composer.json`
    - Any non-custom PHP code, including to WordPress core, new plugins, etc., should be managed with Composer and updated in this way.
* `lando npm run gulp` will need to be ran in `web/wp-content/themes/bumblebee` after any changes to the SASS source files
* `lando npm install` will need to be ran after any changes to `web/wp-content/themes/bumblebee/package.json`

### Tools
* `lando composer code-sniff` will check themes and plugins against WordPress coding standards.
* `lando composer unit-test` will run the defined unit tests using PHPUnit.
* `lando composer local-behat` will run the acceptance tests.


## CI/CD pipeline
CircleCI builds the master branch and every Pull Request to this repository.
If you want to set up your own deployment pipeline, you will need to add the following environment variables in the CircleCI UI. See [https://circleci.com/docs/2.0/environment-variables](https://circleci.com/docs/2.0/environment-variables/)/ for details.

* `TERMINUS_SITE`:  Name of the Pantheon site to run tests on, e.g. my_site
* `TERMINUS_TOKEN`: The Pantheon machine token
* `GITHUB_TOKEN`:   The GitHub personal access token
* `GIT_EMAIL`:      The email address to use when making commits
* `TEST_SITE_NAME`: The name of the test site to provide when installing.
* `ADMIN_PASSWORD`: The admin password to use when installing.
* `ADMIN_EMAIL`:    The email address to give the admin when installing.

* If you're using your own Pantheon account, edit `.lando.yml` and update `name`, `site` and `id` to match those of your Pantheon site
    - You will also need to edit the node proxy if you wish to access BrowserSync at a different URL

## Contributing
Every pull request has to pass a set of automated tests in order to be merged:

* Coding Standards: We're using the official [WordPress Coding Standards](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards) for custom PHP files
* Features: All tests defined in tests/features must pass
* Frontend Performance: Pages in `key_pages.json` will be tested (with `?variant=noads`) for frontend performance using Lighthouse, on every pushed commit. Tests are compared against the current `master` branch (`dev` environment), and overall performance score must not drop beyond 5 points. In case a feature NEEDS to be merged anyways, a Product Owner will sign off on the PR.
* Visual Regressions: These checks won't block a PR from being merged, but will be highlighted as part of the tests results. If there are visual regressions, QA or PO must sign off on the PR. All pages from `key_pages.json` will be tested using the `?variant=noads` URL.

## Note about key_pages.json
This file contains an Array of Objects, each object composed by a `label` and an `url` - The label is a friendly identifier for a sample page and must be a single word. The URL is relative, and must not start with the `/` character (it's added automatically). Pages tracked here will be used for Visual Regression and Frontend Performance tests on every build, so the more pages the slower the build.

## Credits
This repository is a fork of https://github.com/ataylorme/Advanced-WordPress-on-Pantheon
