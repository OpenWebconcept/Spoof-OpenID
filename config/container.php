<?php

declare(strict_types=1);

return [
    'plugin.name'       => 'OWC Spoof OpenID',
    'plugin.slug'       => 'owc-spoof-id',
    'plugin.version'    => '1.0.0',
    'plugin.file'       => \dirname(__DIR__) . '/index.php',
    'plugin.path'       => \dirname(__DIR__),
    'plugin.url'        => plugins_url(\basename(\dirname(__DIR__))),
    'theme.path'        => fn () => \defined('STYLESHEETPATH') ? STYLESHEETPATH : TEMPLATEPATH,

    'user.loggedin'     => fn () => is_user_logged_in(),
    'user.current'      => fn () => wp_get_current_user(),
];
