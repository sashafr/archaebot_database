# Linnaeus
This theme is designed to support browsing items described primarily using [Darwin Core](http://rs.tdwg.org/dwc/). It is a modification of the [Seasons](https://github.com/omeka/theme-seasons) theme.

[Theme Demo](http://pennds.org/archaebot_database/)

## Features
Extensions of the original theme:
* A "Taxonomy" browsing tab has been added that will populate with a hierarchy of pages based on metadata fields labelled "Family", "Genus", and "Species" (if they exist)
* Items will display values of "Genus" and "Species" metadata fields instead of "Title" if those fields exist (otherwise, title is still used)

## Requirements
Tested on Omeka 2.5 | Built on Seasons 2.4

## Installation

* Download zip file and upload it your to your Omeka installation's `themes` directory. Unzip the folder. Then install through the Omeka Dashboard.

    **or**

* On the command line, navigate to the `themes` directory of your Omeka installation and run `git clone https://github.com/upenndigitalscholarship/archaebot_database.git`. Then install the theme through the Omeka Dashboard.

**Developed by the Penn Libraries Summer Digital Scholarship Interns Josh Berg, Nia Hammond, and Anna Marion**