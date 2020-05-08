# Changelog

All Notable changes to `NewsCRUD` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

-------------
IMPORTANT
-------------

We no longer use this file to keep track of changes, after version 4.0.0. Please see our repo's Releases tab, on Github - https://github.com/Laravel-Backpack/NewsCRUD/releases

-------------

## 4.0.0 - 2020-05-06

### Added
- support for Backpack 4.1
- column anchors to CategoryCRUD;
- filters to ArticleCRUD;
- relationship columns to ArticleCRUD, along with inlineCreate for both Category and Tags;

### Removed
- support for Backpack 4.0


-------------

## 3.0.3 - 2020-03-05

### Changed
- upgraded PHPUnit;
- Added Release Drafter Github Probot;


## 3.0.2 - 2020-03-05

### Added
- support for Laravel 7;


## 3.0.1 - 2019-12-17

### Fixed
- fixed #39 merged #40 - allow installation on Backpack 4.0 on Laravel 5.8; 


## 3.0.0 - 2019-09-24

### Added
- support for Backpack v4;

### Removed
- support for Backpack v3;

-------------


## 2.1.11 - 2019-09-04

### Added
- support for Laravel 6;


## 2.1.10 - 2019-03-12

### Added
- support for Laravel 5.8 and CRUD 3.6;

## 2.1.9 - 2018-11-26

### Fixed
- authorization in form request files;


## 2.1.8 - 2018-11-22

### Fixed
- travis config file;


## 2.1.7 - 2018-11-22

### Fixed
- using ```backpack_auth()``` in Crud requests instead of Auth;
- support for CRUD 3.4 and 3.5;

## 2.1.6 - 2017-11-29

### Added
- package auto-discovery;


## 2.1.4 - 2017-07-06

### Added
- overwritable routes file;


## 2.1.3 - 2017-04-05

### Fixed
- In category creation page, user can define custom slug for category;
- Tag relationship to Article;


## 2.1.2 - 2016-10-23

### Fixed
- routes now respect the route_prefix set in the base package config file;


## 2.1.1 - 2016-10-22

### Added
- SluggableScopeHelpers trait to all models, in order for findBySlug() method to work;


## 2.1.0 - 2016-08-31

### Added
- Updated Eloquent-Sluggable to v4.


## 2.0.4 - 2016-08-30

### Added
- Eloquent Sluggable requirement in composer.json


## 2.0.3 - 2016-07-31

### Fixed
- Working bogus unit tests.


## 2.0.2 - 2016-07-31

### Added
- Bogus unit tests. At least we'be able to use travis-ci for requirements errors, until full unit tests are done.



## 2.0.1 - 2016-07-30

### Added
- fixed various bugs;



## 2.0.0 - 2016-07-24

### Added
- slugs for categories and tags;
- check column for articles featured column;
- switched to the 'admin' middleware for the routes;
- removed setFeaturedAttribute on Article, because it was too specific;


## 1.0.3 - 2016-07-24

### Added
- Fixed Category children relationship.


## 1.0.1 - 2016-07-23

### Added
- Backpack\CRUD 3.0 dependency.


## 1.0.0 - 2016-05-27

### Added
- Initial code.
