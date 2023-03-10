# Greenrivers Hotjar Plugin

The **Hotjar** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav).

It allows You to add hotjar script for collect and tracking data.

## Installation

Installing the Hotjar plugin can be done in one of three ways:
- GPM (Grav Package Manager)
- manual method
- admin method

### GPM Installation (Preferred)

To install the plugin via the [GPM](http://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line),
navigate to the root of your Grav-installation, and enter:

    bin/gpm install hotjar

This will install the Hotjar plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/hotjar`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`.
Then rename the folder to `hotjar`. You can find these files on [GitHub](https://github.com/greenrivers/grav-plugin-hotjar) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/hotjar

> NOTE: This plugin is a modular component for Grav which may require other plugins to operate,
> please see its [blueprints.yaml-file on GitHub](https://github.com/greenrivers/grav-plugin-hotjar/blob/master/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/hotjar/hotjar.yaml` to `user/config/plugins/hotjar.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
hjsv: 6
```

Note that if you use the Admin Plugin, a file with your configuration named hotjar.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

## Usage

Properly working of Hotjar integration requires Hotjar ID.

Hotjar snippet version is set to the current Hotjar version.

Clear the cache after updating the configuration.

## Credits

https://help.hotjar.com/hc/en-us/articles/115011639927-What-is-the-Hotjar-Tracking-Code-
