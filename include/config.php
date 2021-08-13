<?php
/**
 * CodeWork : Freelancing Platform
 * Copyright (c) CodeWork (https://github.com/gaurangkumar/codework).
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) CodeWork (https://github.com/gaurangkumar/codework)
 *
 * @link          http://codework.ml/
 * @since         1.0.0
 *
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Krunal Bhavsar
 * @filename      var.php
 */
date_default_timezone_set('Asia/Kolkata');
define('NOW', date('Y-m-d-H-i-s', time()));

session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'id13666318_codework';

$site = 'CodeWork';

$logo = 'asset/logo.png';
$favicon = 'asset/favicon.ico';
$made_by = 'GK & Vivek & Priya';
