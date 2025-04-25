<?php

/**
 * Plugin Name:       OWC Spoof OpenID
 * Plugin URI:        https://www.openwebconcept.nl/
 * Description:       Spoof logging into OpenID providers such as DigiD and eHerkenning
 * Version:           1.0.0
 * Author:            sanderdekroon
 * Author URI:        https://sanderdekroon.net
 * License:           EUPL-1.2
 * License URI:       https://interoperable-europe.ec.europa.eu/sites/default/files/custom-page/attachment/2020-03/EUPL-1.2%20EN.txt
 * Text Domain:       owc-spoof-openid
 * Domain Path:       /languages
 */

namespace OWC\SpoofOpenId;

require_once 'vendor/autoload.php';

$plugin = new Plugin();
$plugin->boot();
