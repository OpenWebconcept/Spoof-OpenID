# Spoof OpenID

Spoof logging into OpenID providers such as DigiD and eHerkenning.

## Description

The **Spoof OpenID** WordPress plugin is a development tool designed to simulate logging into OpenID providers such as DigiD and eHerkenning. This plugin is ideal for testing and development environments where real authentication with OpenID providers is not feasible or practical.

### Key Features:
- Simulates authentication with OpenID providers
- Supports providers DigiD and eHerkenning
- Allows applying the spoofing only to admins or logged-in users
- Only(!) works with the [OWC IDP Userdata](https://github.com/OpenWebconcept/idp-userdata) package

> [!IMPORTANT]
> This plugin is intended for development and testing purposes only and should not be used in production environments.

## Installation

Head over to [Releases](https://github.com/OpenWebconcept/Spoof-OpenID/releases) and download the latest release. Install this plugin like you would any other WordPress plugin.

### Development setup

Clone this repository to your machine and use `composer` to install the dependencies:

```sh
$ composer install
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.
