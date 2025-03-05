# Backpack\NewsCRUD

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

An admin panel for news articles on Laravel, using [Backpack\CRUD](https://github.com/Laravel-Backpack/crud). Write articles, with categories and tags.


> ### Security updates and breaking changes
> Please **[subscribe to the Backpack Newsletter](http://backpackforlaravel.com/newsletter)** so you can find out about any security updates, breaking changes or major features. We send an email every 1-2 months.



## Requirements

This package requires both `backpack/crud` but also `backpack/pro` (the paid addon). If you do NOT have access to `backpack/pro` you can [purchase it here](https://backpackforlaravel.com/pricing). Alternatively, you can use the installation method (A), then:
- remove all PRO features;
- replace PRO fields with FREE fields;


## Installation

Since NewsCRUD is just a Backpack\CRUD example, you can choose to install it one of two ways.

**(A) Download and place files in your application** (recommended; remember to also ```composer require cviebrock/eloquent-sluggable```)

or

**(B) As a package**

The only PRO of installing it as a package is that you may benefit from updates. But the reality is there is very little (if any) bug fixing to do, so you probably won't need to update it, ever.



#### Installation type (A) - download


1) [Download the latest build](https://github.com/Laravel-Backpack/NewsCRUD/archive/master.zip).

2) Paste the 'app' and 'database' folders over your projects (merge them). No file overwrite warnings should come up.

3) Replace all mentions of 'Backpack\NewsCRUD\app' in the pasted files with your application's namespace ('App' if you haven't changed it):
- app/Http/Controllers/Admin/ArticleCrudController.php
- app/Http/Controllers/Admin/CategoryCrudController.php
- app/Http/Controllers/Admin/TagCrudController.php
- app/Http/Requests/ArticleRequest.php
- app/Http/Requests/CategoryRequest.php
- app/Http/Requests/TagRequest.php
- app/Models/Article.php
- app/Models/Category.php
- app/Models/Tag.php

4) Run the migration to have the database table we need:
```
php artisan migrate
```

5) Add NewsCRUD to your routes file:

```
Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    // Backpack\NewsCRUD
    Route::crud('article', 'ArticleCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('tag', 'TagCrudController');
});
```

6) [optional] Add a menu item for it in resources/views/vendor/backpack/ui/inc/menu_items.blade.php:

```html
<x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="News" />
    <x-backpack::menu-dropdown-item title="Articles" icon="la la-newspaper-o" :link="backpack_url('article')" />
    <x-backpack::menu-dropdown-item title="Categories" icon="la la-list" :link="backpack_url('category')" />
    <x-backpack::menu-dropdown-item title="Tags" icon="la la-tag" :link="backpack_url('tag')" />
</x-backpack::menu-dropdown>
```

7) [optional] If you need the browse field to upload images, please install [Laravel-Backpack/FileManager](https://github.com/Laravel-Backpack/FileManager#installation).


#### Installation type (B) - package

1) In your terminal, run:

``` bash
composer require backpack/newscrud
```

2) Publish the migration:

```
php artisan vendor:publish --provider="Backpack\NewsCRUD\NewsCRUDServiceProvider"
```

3) Run the migration to have the database table we need:

```
php artisan migrate
```

4) [optional] Add a menu item for it in resources/views/vendor/backpack/ui/inc/menu_items.blade.php:

```html
<x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="News" />
    <x-backpack::menu-dropdown-item title="Articles" icon="la la-newspaper-o" :link="backpack_url('article')" />
    <x-backpack::menu-dropdown-item title="Categories" icon="la la-list" :link="backpack_url('category')" />
    <x-backpack::menu-dropdown-item title="Tags" icon="la la-tag" :link="backpack_url('tag')" />
</x-backpack::menu-dropdown>
```

5) [optional] If you need the browse field to upload images, please install [Laravel-Backpack/FileManager](https://github.com/Laravel-Backpack/FileManager#installation).



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Overwriting functionality

If you need to modify how this works in a project:
- create a ```routes/backpack/newscrud.php``` file; the package will see that, and load _your_ routes file, instead of the one in the package;
- create controllers/models that extend the ones in the package, and use those in your new routes file;
- modify anything you'd like in the new controllers/models;

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email tabacitu@backpackforlaravel.com instead of using the issue tracker.

Please **[subscribe to the Backpack Newsletter](http://backpackforlaravel.com/newsletter)** so you can find out about any security updates, breaking changes or major features. We send an email every 1-2 months.

## Credits

- [Cristian Tabacitu][link-author]
- [All Contributors][link-contributors]

## License

Backpack is free for non-commercial use and 49 EUR/project for commercial use. Please see [License File](LICENSE.md) and [backpackforlaravel.com](https://backpackforlaravel.com/#pricing) for more information.

## Hire us

We've spend more than 10.000 hours creating, polishing and maintaining administration panels on Laravel. We've developed e-Commerce, e-Learning, ERPs, social networks, payment gateways and much more. We've worked on admin panels _so much_, that we've created one of the most popular software in its niche - just from making public what was repetitive in our projects.

If you are looking for a developer/team to help you build an admin panel on Laravel, look no further. You'll have a difficult time finding someone with more experience & enthusiasm for this. This is _what we do_. [Contact us - let's see if we can work together](https://backpackforlaravel.com/need-freelancer-or-development-team).


[ico-version]: https://img.shields.io/packagist/v/backpack/NewsCRUD.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-dual-blue?style=flat-square
[ico-travis]: https://img.shields.io/travis/Laravel-Backpack/NewsCRUD/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Laravel-Backpack/NewsCRUD.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Laravel-Backpack/NewsCRUD.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/NewsCRUD.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/NewsCRUD
[link-travis]: https://travis-ci.org/Laravel-Backpack/NewsCRUD
[link-scrutinizer]: https://scrutinizer-ci.com/g/Laravel-Backpack/NewsCRUD/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Laravel-Backpack/NewsCRUD
[link-downloads]: https://packagist.org/packages/backpack/NewsCRUD
[link-author]: https://github.com/tabacitu
[link-contributors]: ../../contributors
