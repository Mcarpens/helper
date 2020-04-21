<?php

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload

use Mcarpens\Helper\Helper;

?>
<h3>Get TimeAgo from DB timestamp</h3>
<?= Helper::timeAgo('2020-04-21 08:24:00') ?>
<br>
<?= Helper::timeAgo(date('Y-m-d H:i:s')); ?>
<h3>Get Formatted time from DB timestamp</h3>
<?= Helper::getFormattedTime(date('Y-m-d H:i:s'), 5); ?>
<h3>Get Server CPU usage</h3>
<?= Helper::get_server_cpu_usage(); ?>
<h3>Number format precision</h3>
<?= Helper::numberFormatPrecision(Helper::get_server_cpu_usage(), 2, '.') ?>
<h3>Slugify</h3>
<p>Input: Hello World</p>
<p>Output: <?= Helper::slugify('Hello World') ?></p>
<h3>Get month</h3>
<?= Helper::getMonth('4') ?>
<h3>Generate random string</h3>
<?= Helper::generateRandomString(12); ?>
<h3>Text shortner</h3>
<p>Input:<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Output:<br><?= Helper::textShortner('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0', '100'); ?></p>