<?php
// include/rewrite.php
$_SERVER['SCRIPT_NAME'] = str_replace(__DIR__, '', __FILE__);
$_SERVER['SCRIPT_FILENAME'] = __FILE__;
// Replicate the .htaccess rewrite to index.php
$url_parts = parse_url($_SERVER["REQUEST_URI"]);
$_req = rtrim($_SERVER['DOCUMENT_ROOT'] . $url_parts['path'], '/' . DIRECTORY_SEPARATOR);
include __DIR__ . '/../index.php';

