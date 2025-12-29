<?php

require_once __DIR__ . '/core/Router.php';

header('Content-Type: application/json');

Router::dispatch();
