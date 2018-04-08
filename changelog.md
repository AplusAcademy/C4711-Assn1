# Change Log

Team name: recoil
Team membership:
- Luke Lee (Captain)
- Roger Zhang (First Mate)
- Alex Xia (Second Mate)  
Team conventions: Allman notation, markdown for changelog  
Changelog format: [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet) 

## [0.0.16] - 2018-04-06
### Added
- Added tooltips of item info as tooltip/title tag on homepage, doesn't need it on equipment page
- Added tooltips of names of empty slots as their category name as tooltip/title tag on homepage

## [0.0.15] - 2018-04-05
### Added
- Added changing item info in EquipmentsController & assembly
- Added updating item info in csv 

### Changed
- Changed owner mode to user & admin modes
- preset edit box now appears to user & admins
- equipments page is now form instead of static text

## [0.0.14] - 2018-04-05
### Added
- Added Accessories entity model for unit testing on valid attributes of each accessory
- Added AccessoriesTest model to run the test
- Added Composer and PHPUnit for unit test to project root
- Added code coverage in PHPUnit configuration file for this project

### Changed
- Added to .gitignore to ignore anything in the vendor folder, composer.lock, tests/coverage

## [0.0.13] - 2018-04-05
### Added
- js and css for homepage

### Changed
- Separated and format on homepage.php

## [0.0.12] - 2018-04-04
### Added
- roles, can now toggle between guest, owner, & logged out mode
- added preset editor that appears in owner mode, allows updating & creating new presets

### Changed
- biggest update since the images became draggable
- clicking update preset will update preset name(only if user entered something into the field) and any different items
of the selected preset in the drop down
- presets can now have empty slots(can even have no items at all)
- cannot create presets with no names 

## [0.0.11] - 2018-03-24
### Added
- items.json, unused since EquipmentController can parse a json version from the csv models
- Stats, adding / replacing equipped items now update stat box on the screen 

### Changed
- homepage no longer has hard-coded inventory, now dynamically loads using a json-fied version of csv models from 
EquipmentController.php
- fixed some styling issues with inventory 

^Assignment2
vAssignment1

## [0.0.10] - 2018-03-23
### Added
- Implemented Drag and drop items via vanilla JS
- Can only drag and drop items into correct slots
- Dragging in new item into slot replaces old one
- Added categorized hardcoded inventory on homepage

## [0.0.9] - 2018-02-11
### Updated
- changelog
- Replaced glove_4.png with glove_3.png
- Removed test link to presets

## [0.0.8] - 2018-02-11
### Added
- Code comments for each controller and model

### Updated
- changelog

### Removed
- History controller and history view

## [0.0.7] - 2018-02-11
### Added
- presets dropdown on the homepage
- presets can now be populated per choice

### Updated
- names for the preset image
- changelog

## [0.0.6] - 2018-02-10
### Added
- Added assetscsv.php in models which extends CSV_Model
- Added presetscsv.php in models which extends CSV_Model
- Added presets.csv in data folder
- Routes link to make each category links to corresponding page

### Changed
- Modified content for about page
- Fixed css style for dropdown menu item for Equipments
- Moved assets.csv to [project root]/data/
- Inserted a new column 'id' in assets.csv as first column
- Modified presets view and equipments view so now it grabs img info from csv file


## [0.0.5] - 2018-02-09
### Added
- CSV file made for all items, with made up stats vaguely based on the 3 loadouts 

### Changed
- All weapons are now under generic category "weapon"

### Removed
- All shields & quivers

## [0.0.4] - 2018-02-09
### Added
- Equipment and preset render
- Equipment/preset controller and data array

### Updated
- changelog

## [0.0.3] - 2018-02-09
### Added
- Added placeholder pages for assembly, history, and about

### Changed
- formatted template.php

## [0.0.2] - 2018-02-09
### Added
- Main page and main template
- Image to the homepage
- js/jquery/Bootstrap libraries

### Changed
- updated changelog
- updated page titile from controller and config

## [0.0.1] - 2018-02-08
### Added
- a ton of assets from Path of Exile
- temporary drop down on landing page
- Michal said this is allowed

### Changed
- Landing page now displays empty inventory
- temporary has placeholder values

## [0.0.0] - 2018-02-08
### Added
- Team repo forked from starter4 project
- Added changelog.md

### Changed
- Changelog updated
