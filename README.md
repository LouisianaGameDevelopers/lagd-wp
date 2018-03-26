# 🐘 LAGD-WP

This project contains all of the assets and instructions needed for getting our
WordPress-powered Gamedev Directory API up and running.

## Table of contents

* [<g-emoji class="g-emoji" alias="elephant" fallback-src="https://assets-cdn.github.com/images/icons/emoji/unicode/1f418.png">🐘</g-emoji> LAGD-WP](#-lagd-wp)
  * [Table of contents](#table-of-contents)
  * [Overview](#overview)
  * [Setup](#setup)
     * [Prerequisites](#prerequisites)
     * [Download WordPress](#download-wordpress)
     * [Integrate LAGD-WP](#integrate-lagd-wp)
     * [Install dependencies](#install-dependencies)
     * [Set up your environment](#set-up-your-environment)
     * [Install WordPress](#install-wordpress)
     * [Install plugins](#install-plugins)
  * [License](#license)

## Overview

The [LAGD GameDev Directory](https://www.lagd.network/directory) allows users
to browse a catalog of Louisiana-based game developers and the projects that
they’ve released. The software that presents the directory to end users fetches
data from a GraphQL API endpoint—that’s what this project accomplishes. A
high-level overview of our application setup:

* Uses WordPress custom types to store the data we require
  (games, people, studios, et al.)
* Uses WordPress custom fields to store data about each custom type
* Uses Amazon S3 for media/upload persistance
* Exposes a GraphQL API whose schema defines the queries required by the
  Gamedev Directory

## Setup

### Prerequisites

This setup guide makes a few assumptions about the software you’ve got
access to:

* [Git](https://git-scm.com/)
* [WP-CLI](https://wp-cli.org/)
* [Composer](https://getcomposer.org/)

Of course, your system will need to meet the
[reqiurements for WordPress](https://wordpress.org/about/requirements/)
as well.

### Download WordPress

Change to the directory that from which you will be serving your application and
use WP-CLI to download and install WordPress:

    $ wp core download --locale=en_US

### Integrate LAGD-WP

Before you install WordPress you’ll need to integrate LAGD-WP into your fresh
download. To do so, initialize a Git repository at the root of your application,
then add LAGD-WP as a remote:

    $ git init
    $ git remote add origin https://github.com/LouisianaGameDevelopers/lagd-wp.git

Now, fetch and checkout LAGD-WP’s master branch:

    $ git fetch origin
    $ git checkout --track origin/master

Lastly, go ahead and initialize all of the LAGD-WP’s submodules:

    $ git submodule update --init --recursive

### Install dependencies

LAGD-WP currently has one external PHP dependency. Luckily, this project comes
with a `composer.json` file, so all you have to do to satisfy it is:

    $ composer install

### Set up your environment

LAGD-WP uses [PHP dotenv](https://github.com/vlucas/phpdotenv) to inject
variables into the system environment. Have a look at [the example `.env`](https://github.com/LouisianaGameDevelopers/lagd-wp/blob/master/.env.example)
file, then create your own `.env` file in your application, filling in your
database info, WordPress secret keys, and Amazon S3 credentials.

You can grab a set of WordPress secret keys at
https://api.wordpress.org/secret-key/1.1/salt.

### Install WordPress

At this point, you’re ready to install WordPress! Take a deep breath and let
WP-CLI be your guide:

$ wp core install \
    --url=https://admin.lagd.network \
    --title=LAGD \
    --admin_user=yourname \
    --admin_password=something-super-secret! \
    --admin_email=you@lagd.network

### Install plugins

We use the following plugins to help get things done and keep shit running:

* [WPGraphQL](https://github.com/wp-graphql/wp-graphql)
* [WPGraphiQL](https://github.com/wp-graphql/wp-graphiql)
* [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
* [WP Offload S3 Lite](https://wordpress.org/plugins/amazon-s3-and-cloudfront/)
* [WP fail2ban](https://wordpress.org/plugins/wp-fail2ban/)

You don’t need to install the WPGraphiQL or WP-GraphiQL plugins, as
they are included as submodules. For the others, WPI-CLI comes in handy:

    $ wp plugin install advanced-custom-fields amazon-s3-and-cloudfront wp-fail2ban

*Pro Tip: Now’s a good time to remove the plugins that come bundles with
WordPress, i.e., `wp plugin delete akismet hello`.*

Now, activate all your plugins:

    $ wp plugin activate --all

Note: I like to use [Admin Menu Editor](https://wordpress.org/plugins/admin-menu-editor/)
to declutter the menus. You can grab it with
`wp plugin install --activate admin-menu-editor`.

## License

Following WordPress’s lead, this project is released under the
[GNU General Public License v2 or later](https://github.com/LouisianaGameDevelopers/lagd-wp/LICENSE),

