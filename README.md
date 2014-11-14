MFCC - ZendSkeletonApplication
=======================

Introduction
------------
This is a simple, skeleton application using the ZF2 MVC layer and module
systems.

This skeleton comes with:

* [Zend Developer Tools](https://github.com/zendframework/ZendDeveloperTools)
* [Zfc Twitter Bootstrap](https://github.com/mwillbanks/ZfcTwitterBootstrap)
* [Doctrine](http://www.doctrine-project.org/)
* [ZfcUser - Doctrine](https://github.com/ZF-Commons/ZfcUser)
* [Social Auth - Doctrine](https://github.com/SocalNick/ScnSocialAuth)
* [Faker](https://github.com/fzaninotto/Faker)
* [Carbon](https://github.com/briannesbitt/Carbon)
* [Flysystem](https://github.com/thephpleague/flysystem)

Project is [optionally] integrated with:
* [Phing](http://www.phing.info/)
* [Bower](http://bower.io/) ([nmp](https://www.npmjs.org/) required)
* [Gulp](http://gulpjs.com/) ([nmp](https://www.npmjs.org/) required)


Installation
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project mfcc/skeleton-application path/to/install

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone https://github.com/Tlapi/ZendSkeletonApplication.git
    cd ZendSkeletonApplication
    php composer.phar self-update
    php -c php.ini composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Project Setup
----------------

### Setup project configs

Set your db connection. Copy `config/autoload/local.php.dist` to `config/autoload/local.php` and provide username, password etc.

Set your social login integration if needed in `config/autoload/scn-social-auth.global.php` and `config/autoload/scn-social-auth.local.php.dist`

### Create entities

Create your Entities and Repositories. Example provided is in `module/Application/src/Application/Entity/Article.php`

### Create database

Run 
```
php vendor/bin/doctrine orm:schema-tool:update --force
``` 
to create your database.

Run faker to fake your entities data if you want
```
php public/index.php faker
```

### [optional] Set up Phing

Set your deployment options in `build.xml` and deploy with cli: 
```
php phing-latest.phar
``` 
or apply your hotfix with: 
```
php phing-latest.phar applyhotfix
```

### [optional] Set up Bower

Install bower (if not installed)
```
npm install -g bower
```

Require your project dependencies, e.g.:
```
bower install jquery
```

And update your package file to share with others
```
bower init
```

### [optional] Set up Gulp

Install gulp globally (if needed)
```
npm install --global gulp
```
Edit `gulpfile.js` to meet your needs (set `publicDir` variable) and run
```
gulp
```

To run individual tasks, use `gulp <task> <othertask>`.

Default Gulp setup
----------------------------------

Gulp comes with following packages:
* [gulp-jshint](https://www.npmjs.org/package/gulp-jshint)
* [gulp-sass](https://www.npmjs.org/package/gulp-sass)
* [gulp-concat](https://www.npmjs.org/package/gulp-concat)
* [gulp-uglify](https://www.npmjs.org/package/gulp-uglify)
* [gulp-rename](https://www.npmjs.org/package/gulp-rename)
* [main-bower-files](https://www.npmjs.org/package/main-bower-files)

`gulp` command does following:
* Gets all libraries installed and required by bower in `bower.js`, copies them to `publicdir/js/libs` and concatenates them to `publicdir/dist/libs.js`, `publicdir/dist/libs.min.js`
* checks any JavaScript file in our `publicdir/js` directory and makes sure there are no errors in our code (excluding subfolders)
* compiles any of our Sass files in our `publicdir/scss` directory into .css and saves the compiled .css file in our `publicdir/css` directory
* concatenates all JavaScript files in our `publicdir/js` directory (excluding subfolders) and saves the ouput to `publicdir/dist/scripts.js`, `publicdir/dist/scripts.min.js`

Gulp watch watches `publicdir/js`, `publicdir/js/libs` and `publicdir/js/scss` for any changes.

How to use [faker](https://github.com/fzaninotto/Faker)
----------------------------------

Edit `FakerController.php` and then just run `php public/index.php faker`

Example content of `FakerController.php`:

```
$generator = \Faker\Factory::create();
$populator = new \Faker\ORM\Doctrine\Populator($generator, $this->getEntityManager());
$populator->addEntity('SomeEntity', 1000);
$populator->addEntity('ZfcUser\Entity\User', 100, array(
  'username' => null
));
$insertedPKs = $populator->execute();
```

Find more details [here](https://github.com/fzaninotto/Faker)
